<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Analysis\Filter\KeepTypesModeEnum;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-keep-types-tokenfilter.html
 */
class KeepTypes extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $types = [];
    private ?KeepTypesModeEnum $mode = null;

    /**
     * @param string $name
     * @param string[] $types
     */
    public function __construct(
        string $name,
        array $types
    ) {
        parent::__construct($name);

        $this->setTypes($types);
    }

    /**
     * Type of filter not a part of <types> param!
     * @inheritdoc
     */
    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::KEEP_TYPES;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('types')]
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setTypes(array $values): self
    {
        $this->types = [];
        foreach ($values as $value) {
            $this->addType($value);
        }

        return $this;
    }

    /**
     * Add token type to <types> param
     * @param string $value
     * @return $this
     */
    public function addType(string $value): self
    {
        $this->types[] = $value;
        return $this;
    }

    #[EnumFieldOption('mode')]
    public function getMode(): ?KeepTypesModeEnum
    {
        return $this->mode;
    }

    public function setMode(?KeepTypesModeEnum $value): self
    {
        $this->mode = $value;
        return $this;
    }
}
