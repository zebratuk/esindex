<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analyzer.html
 */
trait HasAnalyzer
{
    private ?string $optAnalyzer = null;
    private ?string $optSearchQuoteAnalyzer = null;

    #[FieldOption('analyzer')]
    public function getAnalyzer(): ?string
    {
        return $this->optAnalyzer;
    }

    public function setAnalyzer(?string $value): self
    {
        $this->optAnalyzer = $value;
        return $this;
    }

    #[FieldOption('search_quote_analyzer')]
    public function getSearchQuoteAnalyzer(): ?string
    {
        return $this->optSearchQuoteAnalyzer;
    }

    public function setSearchQuoteAnalyzer(?string $value): self
    {
        $this->optSearchQuoteAnalyzer = $value;
        return $this;
    }
}
