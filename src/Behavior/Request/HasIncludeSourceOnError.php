<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasIncludeSourceOnError
{
    private ?bool $optIncludeSourceOnError = null;

    #[BooleanFieldOption('include_source_on_error')]
    public function getIncludeSourceOnError(): ?bool
    {
        return $this->optIncludeSourceOnError;
    }

    public function setIncludeSourceOnError(?bool $value): self
    {
        $this->optIncludeSourceOnError = $value;
        return $this;
    }
}
