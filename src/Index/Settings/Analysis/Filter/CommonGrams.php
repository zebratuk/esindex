<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;
use Esindex\Enums\Index\SectionEnum;
use Esindex\Exceptions\InvalidConfigurationException;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-common-grams-tokenfilter.html
 */
class CommonGrams extends AbstractFilter
{
    private array $commonWords = [];
    private ?string $commonWordsPath = null;

    public function __construct(
        string $name,
        private ?bool $ignoreCase = null,
        private ?bool $queryMode = null
    ) {
        parent::__construct($name);
    }

    public function getCommonWords(): array
    {
        return $this->commonWords;
    }

    public function setCommonWords(array $words): self
    {
        $this->commonWords = [];
        foreach ($words as $word) {
            $this->addCommonWord($word);
        }

        return $this;
    }

    public function addCommonWord(string $word): self
    {
        $this->commonWords[] = $word;
        return $this;
    }

    public function getCommonWordsPath(): ?string
    {
        return $this->commonWordsPath;
    }

    public function setCommonWordsPath(?string $value): self
    {
        $this->commonWordsPath = $value;
        return $this;
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

    #[BooleanFieldOption('query_mode')]
    public function getQueryMode(): ?bool
    {
        return $this->queryMode;
    }

    public function setQueryMode(?bool $value): self
    {
        $this->queryMode = $value;
        return $this;
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::COMMON_GRAMS;
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        $result = match(true) {
            !empty($this->commonWords) => ['common_words' => $this->commonWords],
            !empty($this->commonWordsPath) => ['common_words_path' => $this->commonWordsPath],
            default => null
        };

        if (empty($result)) {
            throw new InvalidConfigurationException(
                section: SectionEnum::SETTINGS_ANALYSIS_FILTER,
                field: $this->getName()
            );
        }

        return $result;
    }
}
