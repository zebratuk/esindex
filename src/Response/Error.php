<?php
declare(strict_types=1);

namespace Esindex\Response;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Response\ErrorDTO;

class Error implements ResponseInterface
{
    public const EMPTY_STATUS = -1;

    public function __construct(
        readonly public int $status,
        readonly public ErrorDTO|string $error
    ) {
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'error' => is_string($this->error)
                ? $this->error
                : $this->error->toArray(),
        ];
    }
}
