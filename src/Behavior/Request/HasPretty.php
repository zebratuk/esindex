<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasPretty
{
    private ?bool $optPretty = null;

    #[BooleanFieldOption('pretty')]
    public function getPretty(): ?bool
    {
        return $this->optPretty;
    }

    public function setPretty(?bool $value): self
    {
        $this->optPretty = $value;
        return $this;
    }
}
