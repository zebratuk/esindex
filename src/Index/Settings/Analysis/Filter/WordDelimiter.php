<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasPreserveOriginal;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-word-delimiter-tokenfilter.html
 */
class WordDelimiter extends AbstractFilter
{
    use HasPreserveOriginal;

    private ?bool $catenateAll = null;
    private ?bool $catenateNumbers = null;
    private ?bool $catenateWords = null;
    private ?bool $generateNumberParts = null;
    private ?bool $generateWordParts = null;
    /**
     * @var string[]
     */
    private array $protectedWords = [];
    private ?string $protectedWordsPath = null;
    private ?bool $splitOnCaseChange = null;
    private ?bool $splitOnNumerics = null;
    private ?bool $stemEnglishPossessive = null;
    /**
     * @var string[]
     */
    private array $typeTable = [];
    private ?string $typeTablePath = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::WORD_DELIMITER;
    }

    #[BooleanFieldOption('catenate_all')]
    public function getCatenateAll(): ?bool
    {
        return $this->catenateAll;
    }

    public function setCatenateAll(?bool $value): self
    {
        $this->catenateAll = $value;
        return $this;
    }

    #[BooleanFieldOption('catenate_numbers')]
    public function getCatenateNumbers(): ?bool
    {
        return $this->catenateNumbers;
    }

    public function setCatenateNumbers(?bool $value): self
    {
        $this->catenateNumbers = $value;
        return $this;
    }

    #[BooleanFieldOption('catenate_words')]
    public function getCatenateWords(): ?bool
    {
        return $this->catenateWords;
    }

    public function setCatenateWords(?bool $value): self
    {
        $this->catenateWords = $value;
        return $this;
    }

    #[BooleanFieldOption('generate_number_parts')]
    public function getGenerateNumberParts(): ?bool
    {
        return $this->generateNumberParts;
    }

    public function setGenerateNumberParts(?bool $value): self
    {
        $this->generateNumberParts = $value;
        return $this;
    }

    #[BooleanFieldOption('generate_word_parts')]
    public function getGenerateWordParts(): ?bool
    {
        return $this->generateWordParts;
    }

    public function setGenerateWordParts(?bool $value): self
    {
        $this->generateWordParts = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('protected_words')]
    public function getProtectedWords(): array
    {
        return $this->protectedWords;
    }

    public function setProtectedWords(array $value): self
    {
        $this->protectedWords = $value;
        return $this;
    }

    #[FieldOption('protected_words_path')]
    public function getProtectedWordsPath(): ?string
    {
        return $this->protectedWordsPath;
    }

    public function setProtectedWordsPath(?string $value): self
    {
        $this->protectedWordsPath = $value;
        return $this;
    }

    #[BooleanFieldOption('split_on_case_change')]
    public function getSplitOnCaseChange(): ?bool
    {
        return $this->splitOnCaseChange;
    }

    public function setSplitOnCaseChange(?bool $value): self
    {
        $this->splitOnCaseChange = $value;
        return $this;
    }

    #[BooleanFieldOption('split_on_numerics')]
    public function getSplitOnNumerics(): ?bool
    {
        return $this->splitOnNumerics;
    }

    public function setSplitOnNumerics(?bool $value): self
    {
        $this->splitOnNumerics = $value;
        return $this;
    }

    #[BooleanFieldOption('stem_english_possessive')]
    public function getStemEnglishPossessive(): ?bool
    {
        return $this->stemEnglishPossessive;
    }

    public function setStemEnglishPossessive(?bool $value): self
    {
        $this->stemEnglishPossessive = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('type_table')]
    public function getTypeTable(): array
    {
        return $this->typeTable;
    }

    public function setTypeTable(array $value): self
    {
        $this->typeTable = $value;
        return $this;
    }

    #[FieldOption('type_table_path')]
    public function getTypeTablePath(): ?string
    {
        return $this->typeTablePath;
    }

    public function setTypeTablePath(?string $value): self
    {
        $this->typeTablePath = $value;
        return $this;
    }
}
