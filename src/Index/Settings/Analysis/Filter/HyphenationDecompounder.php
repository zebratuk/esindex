<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-hyp-decomp-tokenfilter.html
 */
class HyphenationDecompounder extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $wordList = [];
    private ?string $wordListPath = null;
    private ?int $maxSubwordSize = null;
    private ?int $minSubwordSize = null;
    private ?int $minWordSize = null;
    private ?bool $onlyLongestMatch = null;
    private ?bool $noSubMatches = null;
    private ?bool $noOverlappingMatches = null;

    public function __construct(
        string $name,
        readonly private string $hyphenationPatternsPath,
        array $wordList = []
    ) {
        parent::__construct($name);

        $this->setWordList($wordList);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::HYPHENATION_DECOMPOUNDER;
    }

    #[FieldOption('hyphenation_patterns_path')]
    public function getHyphenationPatternsPath(): ?string
    {
        return $this->hyphenationPatternsPath;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('word_list')]
    public function getWordList(): array
    {
        return $this->wordList;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setWordList(array $values): self
    {
        $this->wordList = [];
        foreach ($values as $value) {
            $this->addWordToList($value);
        }

        return $this;
    }

    public function addWordToList(string $value): self
    {
        $this->wordList[] = $value;
        return $this;
    }

    #[FieldOption('word_list_path')]
    public function getWordListPath(): ?string
    {
        return $this->wordListPath;
    }

    public function setWordListPath(?string $value): self
    {
        $this->wordListPath = $value;
        return $this;
    }

    #[FieldOption('max_subword_size')]
    public function getMaxSubwordSize(): ?int
    {
        return $this->maxSubwordSize;
    }

    public function setMaxSubwordSize(?int $value): self
    {
        $this->maxSubwordSize = $value;
        return $this;
    }

    #[FieldOption('min_subword_size')]
    public function getMinSubwordSize(): ?int
    {
        return $this->minSubwordSize;
    }

    public function setMinSubwordSize(?int $value): self
    {
        $this->minSubwordSize = $value;
        return $this;
    }

    #[FieldOption('min_word_size')]
    public function getMinWordSize(): ?int
    {
        return $this->minWordSize;
    }

    public function setMinWordSize(?int $value): self
    {
        $this->minWordSize = $value;
        return $this;
    }

    #[BooleanFieldOption('only_longest_match')]
    public function getOnlyLongestMatch(): ?bool
    {
        return $this->onlyLongestMatch;
    }

    public function setOnlyLongestMatch(?bool $value): self
    {
        $this->onlyLongestMatch = $value;
        return $this;
    }

    #[BooleanFieldOption('no_sub_matches')]
    public function getNoSubMatches(): ?bool
    {
        return $this->noSubMatches;
    }

    public function setNoSubMatches(?bool $value): self
    {
        $this->noSubMatches = $value;
        return $this;
    }

    #[BooleanFieldOption('no_overlapping_matches')]
    public function getNoOverlappingMatches(): ?bool
    {
        return $this->noOverlappingMatches;
    }

    public function setNoOverlappingMatches(?bool $value): self
    {
        $this->noOverlappingMatches = $value;
        return $this;
    }
}
