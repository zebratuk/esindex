<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

trait HasPattern
{
    private ?string $optPattern = null;

    #[FieldOption('pattern')]
    public function getPattern(): ?string
    {
        return $this->optPattern;
    }

    public function setPattern(?string $value): self
    {
        $this->optPattern = $value;
        return $this;
    }
}
