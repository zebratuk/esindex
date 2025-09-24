<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/mapping-index.html
 */
trait HasIndex
{
    private ?bool $optIndex = null;

    #[FieldOption('index')]
    public function getIndex(): ?bool
    {
        return $this->optIndex;
    }

    public function setIndex(?bool $value): self
    {
        $this->optIndex = $value;
        return $this;
    }
}
