<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-truncate-tokenfilter.html
 */
class Truncate extends AbstractFilter
{
    private ?int $length = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::TRUNCATE;
    }

    #[FieldOption('length')]
    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(?int $value): self
    {
        $this->length = $value;
        return $this;
    }
}
