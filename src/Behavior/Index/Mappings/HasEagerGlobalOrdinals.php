<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/eager-global-ordinals.html
 */
trait HasEagerGlobalOrdinals
{
    private ?bool $optEagerGlobalOrdinals = null;

    #[FieldOption('eager_global_ordinals')]
    public function getEagerGlobalOrdinals(): ?bool
    {
        return $this->optEagerGlobalOrdinals;
    }

    public function setEagerGlobalOrdinals(?bool $value): self
    {
        $this->optEagerGlobalOrdinals = $value;
        return $this;
    }
}
