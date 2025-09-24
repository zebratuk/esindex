<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasAllowNoIndices
{
    private ?bool $optAllowNoIndices = null;

    #[BooleanFieldOption('allow_no_indices')]
    public function getAllowNoIndices(): ?bool
    {
        return $this->optAllowNoIndices;
    }

    public function setAllowNoIndices(?bool $value): self
    {
        $this->optAllowNoIndices = $value;
        return $this;
    }
}
