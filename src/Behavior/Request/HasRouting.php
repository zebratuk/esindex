<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\FieldOption;

trait HasRouting
{
    private ?string $optRouting = null;

    #[FieldOption('routing')]
    public function getRouting(): ?string
    {
        return $this->optRouting;
    }

    public function setRouting(?string $value): self
    {
        $this->optRouting = $value;
        return $this;
    }
}
