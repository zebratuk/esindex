<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasIgnoreUnavailable
{
    private ?bool $optIgnoreUnavailable = null;

    #[BooleanFieldOption('ignore_unavailable')]
    public function getIgnoreUnavailable(): ?bool
    {
        return $this->optIgnoreUnavailable;
    }

    public function setIgnoreUnavailable(?bool $value): self
    {
        $this->optIgnoreUnavailable = $value;
        return $this;
    }
}
