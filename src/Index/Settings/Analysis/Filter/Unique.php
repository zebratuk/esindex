<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-unique-tokenfilter.html
 */
class Unique extends AbstractFilter
{
    private ?bool $onlyOnSamePosition = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::UNIQUE;
    }

    #[BooleanFieldOption('only_on_same_position')]
    public function getOnlyOnSamePosition(): ?bool
    {
        return $this->onlyOnSamePosition;
    }

    public function setOnlyOnSamePosition(?bool $value): self
    {
        $this->onlyOnSamePosition = $value;
        return $this;
    }
}
