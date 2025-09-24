<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\FieldOption;

trait HasTimeout
{
    /**
     * Integer for Milliseconds.
     * String in format: 10ms, 1s, 1m and so on
     *
     * @var int|string|null
     */
    private int|string|null $optTimeout = null;

    /**
     * @return int|string|null
     */
    public function getTimeout(): int|string|null
    {
        return $this->optTimeout;
    }

    /**
     * Integer for Milliseconds.
     * String in format: 10ms, 1s, 1m and so on
     *
     * @param int|string|null $value
     * @return self
     */
    public function setTimeout(int|string|null $value): self
    {
        $this->optTimeout = $value;
        return $this;
    }

    #[FieldOption('timeout')]
    public function getTimeoutAsString(): ?string
    {
        if (is_string($this->optTimeout)) {
            return $this->optTimeout;
        }

        if (
            null !== $this->optTimeout
            && $this->optTimeout > 0
        ) {
            return "{$this->optTimeout}ms";
        }

        return null;
    }
}
