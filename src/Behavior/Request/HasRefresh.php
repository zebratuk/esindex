<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Request\RefreshEnum;

trait HasRefresh
{
    private ?RefreshEnum $optRefresh = null;

    #[EnumFieldOption('refresh')]
    public function getRefresh(): ?RefreshEnum
    {
        return $this->optRefresh;
    }

    public function setRefresh(?RefreshEnum $value): self
    {
        $this->optRefresh = $value;
        return $this;
    }
}
