<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasHuman
{
    private ?bool $optHuman = null;

    #[BooleanFieldOption('human')]
    public function getHuman(): ?bool
    {
        return $this->optHuman;
    }

    public function setHuman(?bool $value): self
    {
        $this->optHuman = $value;
        return $this;
    }
}
