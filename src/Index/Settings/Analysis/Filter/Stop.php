<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasStopWords;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-stop-tokenfilter.html
 */
class Stop extends AbstractFilter
{
    use HasStopWords;

    private ?bool $ignoreCase = null;
    private ?bool $removeTrailing = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::STOP;
    }

    #[BooleanFieldOption('ignore_case')]
    public function getIgnoreCase(): ?bool
    {
        return $this->ignoreCase;
    }

    public function setIgnoreCase(?bool $value): self
    {
        $this->ignoreCase = $value;
        return $this;
    }

    #[BooleanFieldOption('remove_trailing')]
    public function getRemoveTrailing(): ?bool
    {
        return $this->removeTrailing;
    }

    public function setRemoveTrailing(?bool $value): self
    {
        $this->removeTrailing = $value;
        return $this;
    }
}
