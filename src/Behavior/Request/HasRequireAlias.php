<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasRequireAlias
{
    private ?bool $optRequireAlias = null;

    #[BooleanFieldOption('require_alias')]
    public function getRequireAlias(): ?bool
    {
        return $this->optRequireAlias;
    }

    public function setRequireAlias(?bool $value): self
    {
        $this->optRequireAlias = $value;
        return $this;
    }
}
