<?php
declare(strict_types=1);

namespace Esindex\DTO\Response;

use Esindex\Contracts\Arrayable;

class ErrorDTO implements Arrayable
{
    public function __construct(
        private readonly array $data
    ) {
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getType(): string
    {
        return $this->data['type'];
    }

    public function getReason(): ?string
    {
        return $this->data['reason'] ?? null;
    }

    public function getStackTrace(): ?string
    {
        return $this->data['stack_trace'] ?? null;
    }

    public function getCausedBy(): ?array
    {
        return $this->data['caused_by'] ?? null;
    }

    /**
     * @return array<array>|null
     */
    public function getRootCause(): ?array
    {
        return $this->data['root_cause'] ?? null;
    }

    /**
     * @return array<array>|null
     */
    public function getSuppressed(): ?array
    {
        return $this->data['suppressed'] ?? null;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
