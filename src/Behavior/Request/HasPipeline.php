<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\FieldOption;

trait HasPipeline
{
    private ?string $optPipeline = null;

    #[FieldOption('pipeline')]
    public function getPipeline(): ?string
    {
        return $this->optPipeline;
    }

    public function setPipeline(?string $value): self
    {
        $this->optPipeline = $value;
        return $this;
    }
}
