<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;
use Esindex\Index\Mappings\Unit\IndexPrefixesUnit;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/index-prefixes.html
 */
trait HasIndexPrefixes
{
    private ?IndexPrefixesUnit $optIndexPrefixes = null;

    #[FieldOption(optionLiteral: 'index_prefixes', isEmptyResultAvailable: true)]
    public function getIndexPrefixes(): ?IndexPrefixesUnit
    {
        return $this->optIndexPrefixes;
    }

    public function setIndexPrefixes(?IndexPrefixesUnit $value): self
    {
        $this->optIndexPrefixes = $value;
        return $this;
    }
}
