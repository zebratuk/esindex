<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * Whether full text queries should split the input on whitespace when building a query for this field.
 * Accepts true or false (default).
 */
trait HasSplitQueriesOnWhitespace
{
    private ?bool $optSplitQueriesOnWhitespace = null;

    #[FieldOption('split_queries_on_whitespace')]
    public function getSplitQueriesOnWhitespace(): ?bool
    {
        return $this->optSplitQueriesOnWhitespace;
    }

    public function setSplitQueriesOnWhitespace(?bool $value): self
    {
        $this->optSplitQueriesOnWhitespace = $value;
        return $this;
    }
}
