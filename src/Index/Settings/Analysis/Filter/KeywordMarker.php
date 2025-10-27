<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-keyword-marker-tokenfilter.html
 */
class KeywordMarker extends AbstractFilter
{
    private ?bool $ignoreCase = null;
    /**
     * @var string[]
     */
    private array $keywords = [];
    private ?string $keywordsPath = null;
    private ?string $keywordsPattern = null;

    /**
     * @param string $name
     * @param string[] $keywords
     */
    public function __construct(
        string $name,
        array $keywords
    ) {
        parent::__construct($name);

        $this->setKeywords($keywords);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::KEYWORD_MARKER;
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

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('keywords')]
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setKeywords(array $values): self
    {
        $this->keywords = [];
        foreach ($values as $value) {
            $this->addKeyword($value);
        }

        return $this;
    }

    public function addKeyword(string $value): self
    {
        $this->keywords[] = $value;
        return $this;
    }

    #[FieldOption('keywords_path')]
    public function getKeywordsPath(): ?string
    {
        return $this->keywordsPath;
    }

    public function setKeywordsPath(?string $value): self
    {
        $this->keywordsPath = $value;
        return $this;
    }

    #[FieldOption('keywords_pattern')]
    public function getKeywordsPattern(): ?string
    {
        return $this->keywordsPattern;
    }

    public function setKeywordsPattern(?string $value): self
    {
        $this->keywordsPattern = $value;
        return $this;
    }
}
