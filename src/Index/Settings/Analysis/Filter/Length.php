<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-length-tokenfilter.html
 */
class Length extends AbstractFilter
{
    private ?int $min = null;
    private ?int $max = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::LENGTH;
    }

    #[FieldOption('min')]
    public function getMin(): ?int
    {
        return $this->min;
    }

    public function setMin(?int $value): self
    {
        $this->min = $value;
        return $this;
    }

    #[FieldOption('max')]
    public function getMax(): ?int
    {
        return $this->max;
    }

    public function setMax(?int $value): self
    {
        $this->max = $value;
        return $this;
    }
}
