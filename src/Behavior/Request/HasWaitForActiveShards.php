<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\FieldOption;

trait HasWaitForActiveShards
{
    private ?string $optWaitForActiveShards = null;

    #[FieldOption('wait_for_active_shards')]
    public function getWaitForActiveShards(): ?string
    {
        return $this->optWaitForActiveShards;
    }

    public function setWaitForActiveShards(?string $value): self
    {
        $this->optWaitForActiveShards = $value;
        return $this;
    }
}
