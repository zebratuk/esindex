<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

trait HasBufferSize
{
    private ?int $optBufferSize = null;

    #[FieldOption('buffer_size')]
    public function getBufferSize(): ?int
    {
        return $this->optBufferSize;
    }

    public function setBufferSize(?int $value): self
    {
        $this->optBufferSize = $value;
        return $this;
    }
}
