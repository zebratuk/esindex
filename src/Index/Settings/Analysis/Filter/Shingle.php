<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-shingle-tokenfilter.html
 */
class Shingle extends AbstractFilter
{
    private ?int $maxShingleSize = null;
    private ?int $minShingleSize = null;
    private ?bool $outputUnigrams = null;
    private ?bool $outputUnigramsIfNoShingles = null;
    private ?string $tokenSeparator = null;
    private ?string $fillerToken = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::SHINGLE;
    }

    #[FieldOption('max_shingle_size')]
    public function getMaxShingleSize(): ?int
    {
        return $this->maxShingleSize;
    }

    public function setMaxShingleSize(?int $value): self
    {
        $this->maxShingleSize = $value;
        return $this;
    }

    #[FieldOption('min_shingle_size')]
    public function getMinShingleSize(): ?int
    {
        return $this->minShingleSize;
    }

    public function setMinShingleSize(?int $value): self
    {
        $this->minShingleSize = $value;
        return $this;
    }

    #[BooleanFieldOption('output_unigrams')]
    public function getOutputUnigrams(): ?bool
    {
        return $this->outputUnigrams;
    }

    public function setOutputUnigrams(?bool $value): self
    {
        $this->outputUnigrams = $value;
        return $this;
    }

    #[BooleanFieldOption('output_unigrams_if_no_shingles')]
    public function getOutputUnigramsIfNoShingles(): ?bool
    {
        return $this->outputUnigramsIfNoShingles;
    }

    public function setOutputUnigramsIfNoShingles(?bool $value): self
    {
        $this->outputUnigramsIfNoShingles = $value;
        return $this;
    }

    #[FieldOption('token_separator')]
    public function getTokenSeparator(): ?string
    {
        return $this->tokenSeparator;
    }

    public function setTokenSeparator(?string $value): self
    {
        $this->tokenSeparator = $value;
        return $this;
    }

    #[FieldOption('filler_token')]
    public function getFillerToken(): ?string
    {
        return $this->fillerToken;
    }

    public function setFillerToken(?string $value): self
    {
        $this->fillerToken = $value;
        return $this;
    }
}
