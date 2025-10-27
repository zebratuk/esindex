<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasPreserveOriginal;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-ngram-tokenfilter.html
 */
class Ngram extends AbstractFilter
{
    use HasPreserveOriginal;

    private ?int $maxGram = null;
    private ?int $minGram = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::NGRAM;
    }

    #[FieldOption('max_gram')]
    public function getMaxGram(): ?int
    {
        return $this->maxGram;
    }

    public function setMaxGram(?int $value): self
    {
        $this->maxGram = $value;
        return $this;
    }

    #[FieldOption('min_gram')]
    public function getMinGram(): ?int
    {
        return $this->minGram;
    }

    public function setMinGram(?int $value): self
    {
        $this->minGram = $value;
        return $this;
    }
}
