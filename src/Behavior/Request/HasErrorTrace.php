<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\BooleanFieldOption;

trait HasErrorTrace
{
    private ?bool $optErrorTrace = null;

    #[BooleanFieldOption('error_trace')]
    public function getErrorTrace(): ?bool
    {
        return $this->optErrorTrace;
    }

    public function setErrorTrace(?bool $value): self
    {
        $this->optErrorTrace = $value;
        return $this;
    }
}
