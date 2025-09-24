<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\BooleanFieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/doc-values.html
 */
trait HasDocValues
{
    private ?bool $optDocValues = null;

    #[BooleanFieldOption('doc_values')]
    public function getDocValues(): ?bool
    {
        return $this->optDocValues;
    }

    public function setDocValues(?bool $value): self
    {
        $this->optDocValues = $value;
        return $this;
    }
}
