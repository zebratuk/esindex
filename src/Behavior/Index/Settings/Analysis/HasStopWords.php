<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-stop-tokenfilter.html
 */
trait HasStopWords
{
    private string|array|null $optStopWords = null;
    private ?string $optStopWordsPath = null;

    #[FieldOption('stopwords')]
    public function getStopWords(): string|array|null
    {
        return $this->optStopWords;
    }

    public function setStopWords(string|array|null $value): self
    {
        $this->optStopWords = match(true) {
            is_array($value) => [],
            default => $value
        };

        if (is_array($value)) {
            foreach ($value as $word) {
                $this->addStopWord($word);
            }
        }

        return $this;
    }

    public function addStopWord(string $value): self
    {
        $this->optStopWords = match(true) {
            is_array($this->optStopWords) => $this->optStopWords,
            is_string($this->optStopWords) => [$this->optStopWords],
            default => []
        };

        $this->optStopWords[] = $value;

        return $this;
    }

    #[FieldOption('stopwords_path')]
    public function getStopWordsPath(): ?string
    {
        return $this->optStopWordsPath;
    }

    public function setStopWordsPath(?string $value): self
    {
        $this->optStopWordsPath = $value;
        return $this;
    }
}
