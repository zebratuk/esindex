<?php
declare(strict_types=1);

namespace Esindex\Attribute\Resolver\Unit;

use ReflectionMethod;

class AttributeCollection
{
    private array $attributes = [];

    public function __construct(
        readonly public ReflectionMethod $method
    ) {
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getFirstAttribute(): object|null
    {
        return $this->attributes[0] ?? null;
    }

    public function addAttribute(object $attribute): self
    {
        $this->attributes[] = $attribute;
        return $this;
    }

    public function setAttributes(array $items): self
    {
        $this->attributes = [];
        foreach ($items as $attribute) {
            $this->addAttribute($attribute);
        }

        return $this;
    }
}
