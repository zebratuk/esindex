<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/search-analyzer.html
 */
trait HasSearchAnalyzer
{
    private ?string $optSearchAnalyzer = null;

    #[FieldOption('search_analyzer')]
    public function getSearchAnalyzer(): ?string
    {
        return $this->optSearchAnalyzer;
    }

    public function setSearchAnalyzer(?string $value): self
    {
        $this->optSearchAnalyzer = $value;
        return $this;
    }
}
