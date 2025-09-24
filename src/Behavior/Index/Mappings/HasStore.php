<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/mapping-store.html
 */
trait HasStore
{
    private ?bool $optStore = null;

    #[FieldOption('store')]
    public function getStore(): ?bool
    {
        return $this->optStore;
    }

    public function setStore(?bool $value): self
    {
        $this->optStore = $value;
        return $this;
    }
}
