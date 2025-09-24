<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

trait HasMaxTokenLength
{
    private ?int $optMaxTokenLength = null;

    #[FieldOption('max_token_length')]
    public function getMaxTokenLength(): ?int
    {
        return $this->optMaxTokenLength;
    }

    public function setMaxTokenLength(?int $value): self
    {
        $this->optMaxTokenLength = $value;
        return $this;
    }
}
