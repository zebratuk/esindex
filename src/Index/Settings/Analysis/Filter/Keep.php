<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-keep-words-tokenfilter.html
 */
class Keep extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $keepWords = [];
    /**
     * @var string[]
     */
    private array $keepWordsPath = [];
    private ?bool $keepWordsCase = null;

    /**
     * @param string $name
     * @param string[] $keepWords
     */
    public function __construct(
        string $name,
        array $keepWords = []
    ) {
        parent::__construct($name);

        $this->setKeepWords($keepWords);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::KEEP;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('keep_words')]
    public function getKeepWords(): array
    {
        return $this->keepWords;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setKeepWords(array $values): self
    {
        $this->keepWords = [];
        foreach ($values as $value) {
            $this->addKeepWord($value);
        }

        return $this;
    }

    public function addKeepWord(string $value): self
    {
        $this->keepWords[] = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('keep_words_path')]
    public function getKeepWordsPath(): array
    {
        return $this->keepWordsPath;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setKeepWordsPath(array $values): self
    {
        $this->keepWordsPath = [];
        foreach ($values as $value) {
            $this->addKeepWordsPath($value);
        }

        return $this;
    }

    public function addKeepWordsPath(string $value): self
    {
        $this->keepWordsPath[] = $value;
        return $this;
    }

    #[BooleanFieldOption('keep_words_case')]
    public function getKeepWordsCase(): ?bool
    {
        return $this->keepWordsCase;
    }

    public function setKeepWordsCase(?bool $value): self
    {
        $this->keepWordsCase = $value;
        return $this;
    }
}
