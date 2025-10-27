<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-limit-token-count-tokenfilter.html
 */
class Limit extends AbstractFilter
{
    private ?int $maxTokenCount = null;
    private ?bool $consumeAllTokens = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::LIMIT;
    }

    #[FieldOption('max_token_count')]
    public function getMaxTokenCount(): ?int
    {
        return $this->maxTokenCount;
    }

    public function setMaxTokenCount(?int $value): self
    {
        $this->maxTokenCount = $value;
        return $this;
    }

    #[BooleanFieldOption('consume_all_tokens')]
    public function getConsumeAllTokens(): ?bool
    {
        return $this->consumeAllTokens;
    }

    public function setConsumeAllTokens(?bool $value): self
    {
        $this->consumeAllTokens = $value;
        return $this;
    }
}
