<?php
declare(strict_types=1);

namespace Esindex\Attribute\Resolver;

use Esindex\Attribute\Resolver\Unit\AttributeCollection;
use Esindex\Contracts\Attribute\GetterAttributeInterface;
use ReflectionAttribute;
use ReflectionClass;

class SimpleReflectionResolver
{
    public function buildDataForInstance(object $instance): array
    {
        $collection = $this->getAttributesGetters($instance);
        return $this->buildDataFirstAttribute($instance, ... $collection);
    }

    /**
     * @param string|object $instanceOrClass
     * @param string $attributeClassName
     * @param bool $withInstanceOf
     * @return AttributeCollection[]
     * @throws \ReflectionException
     */
    public function getAttributesGetters(
        object|string $instanceOrClass,
        string $attributeClassName = GetterAttributeInterface::class,
        bool $withInstanceOf = true
    ): array {
        $result = [];

        $reflection = new ReflectionClass($instanceOrClass);
        foreach ($reflection->getMethods() as $method) {
            $attributes = $method->getAttributes(
                $attributeClassName,
                $withInstanceOf ? ReflectionAttribute::IS_INSTANCEOF : 0
            );

            if (empty($attributes)) {
                continue;
            }

            $collection = new AttributeCollection($method);
            $collection->setAttributes(
                \array_map(
                    static fn($attribute) => $attribute->newInstance(),
                    $attributes
                )
            );

            $result[] = $collection;
        }

        return $result;
    }

    public function buildDataFirstAttribute(
        object $object,
        AttributeCollection ...$collection
    ): array {
        $result = [];

        foreach ($collection as $attributeCollection) {
            /** @var GetterAttributeInterface $attribute */
            $attribute = $attributeCollection->getFirstAttribute();

            $value = $this->getValueFromMethod(
                $attribute,
                $attributeCollection->method,
                $object
            );

            $value = $value ?? $attribute->getDefaultValue();
            if (null === $value) {
                continue;
            }

            if (
                (\is_string($value) || \is_array($value))
                && empty($value)
                && !$attribute->isEmptyResultAvailable()
            ) {
                continue;
            }

            $result[$attribute->getStructLiteral()] = $value;
        }

        return $result;
    }

    protected function getValueFromMethod(
        GetterAttributeInterface $attribute,
        \ReflectionMethod $method,
        object $instance
    ): mixed {
        try {
            $value = $method->invoke($instance);
            if (null === $value) {
                return null;
            }

            return $attribute->processValue($value);
        } catch (\ReflectionException $e) {
        }

        return null;
    }
}
