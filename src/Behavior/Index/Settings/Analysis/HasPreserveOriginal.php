<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\BooleanFieldOption;

trait HasPreserveOriginal
{
    private ?bool $optPreserveOriginal = null;

    #[BooleanFieldOption('preserve_original')]
    public function getPreserveOriginal(): ?bool
    {
        return $this->optPreserveOriginal;
    }

    public function setPreserveOriginal(?bool $value): self
    {
        $this->optPreserveOriginal = $value;
        return $this;
    }
}
