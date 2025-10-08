<?php
declare(strict_types=1);

namespace Esindex\Index;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\Resolver\SimpleReflectionResolver;
use Esindex\Behavior\Index\Mappings\HasDynamic;
use Esindex\Behavior\Index\Mappings\HasEnabled;
use Esindex\Behavior\Index\Mappings\HasProperties;
use Esindex\Contracts\Arrayable;
use Esindex\Contracts\Index\Mappings\FieldInterface;
use Esindex\Index\Mappings\DynamicTemplate\DynamicTemplateCollection;
use Esindex\Index\Mappings\FieldCollection;
use Esindex\Index\Mappings\RuntimeFieldCollection;
use Esindex\Index\Mappings\Source;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/explicit-mapping.html
 */
class Mappings implements Arrayable
{
    use HasProperties,
        HasDynamic,
        HasEnabled;

    private ?Source $source = null;

    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/dynamic-field-mapping.html
     */
    private ?bool $dateDetection = null;
    private ?array $dynamicDateFormats = null;
    private ?bool $numericDetection = null;

    private ?DynamicTemplateCollection $dynamicTemplates = null;
    private ?RuntimeFieldCollection $runtime = null;

    #[ArrayableFieldOption(Source::NAME)]
    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $value): self
    {
        $this->source = $value;
        return $this;
    }

    #[BooleanFieldOption('date_detection')]
    public function getDateDetection(): ?bool
    {
        return $this->dateDetection;
    }

    public function setDateDetection(?bool $value): self
    {
        $this->dateDetection = $value;
        return $this;
    }

    #[ArrayableFieldOption('dynamic_date_formats')]
    public function getDynamicDateFormats(): ?array
    {
        return $this->dynamicDateFormats;
    }

    public function setDynamicDateFormats(?array $value): self
    {
        $this->dynamicDateFormats = $value;
        return $this;
    }

    #[BooleanFieldOption('numeric_detection')]
    public function getNumericDetection(): ?bool
    {
        return $this->numericDetection;
    }

    public function setNumericDetection(?bool $value): self
    {
        $this->numericDetection = $value;
        return $this;
    }

    #[ArrayableFieldOption('dynamic_templates')]
    public function getDynamicTemplates(): ?DynamicTemplateCollection
    {
        return $this->dynamicTemplates;
    }

    public function setDynamicTemplates(?DynamicTemplateCollection $value): self
    {
        $this->dynamicTemplates = $value;
        return $this;
    }

    #[ArrayableFieldOption('runtime')]
    public function getRuntime(): ?RuntimeFieldCollection
    {
        return $this->runtime;
    }

    public function setRuntime(?RuntimeFieldCollection $value): self
    {
        $this->runtime = $value;
        return $this;
    }

    public function getPropertiesCount(bool $includeChildren = true, int $maxDepth = 20): int
    {
        if (!$includeChildren) {
            return $this->getProperties()->count();
        }

        $count = 0;
        foreach ($this->getProperties()->getItems() as $property) {
            if ($property instanceof FieldInterface) {
                $count += $this->countPropertiesWithChildren($property, $maxDepth);
            }
        }

        return $count;
    }

    public function toArray(): array
    {
        $result = (new SimpleReflectionResolver())
            ->buildDataForInstance($this);

        return $result;
    }

    private function countPropertiesWithChildren(FieldInterface $field, int $depth): int
    {
        $result = 1;
        if ($depth <= 0) {
            return $result;
        }

        if (method_exists($field, 'getFields')) {
            $collection = $field->getFields();
        } elseif (method_exists($field, 'getProperties')) {
            $collection = $field->getProperties();
        }

        /** @var FieldCollection $collection */
        if (isset($collection)) {
            foreach ($collection->getItems() as $property) {
                $result += $this->countPropertiesWithChildren($property, $depth - 1);
            }
        }

        return $result;
    }
}
