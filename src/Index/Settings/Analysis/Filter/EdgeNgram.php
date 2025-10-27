<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasPreserveOriginal;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-edgengram-tokenfilter.html
 */
class EdgeNgram extends AbstractFilter
{
    use HasPreserveOriginal;

    private ?int $maxGram = null;
    private ?int $minGram = null;
    private ?string $side = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::EDGE_NGRAM;
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

    #[FieldOption('side')]
    public function getSide(): ?string
    {
        return $this->side;
    }

    public function setSide(?string $value): self
    {
        $this->side = $value;
        return $this;
    }
}
