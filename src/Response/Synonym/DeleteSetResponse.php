<?php
declare(strict_types=1);

namespace Esindex\Response\Synonym;

use Esindex\Contracts\ResponseInterface;

class DeleteSetResponse implements ResponseInterface
{
    public function __construct(
        readonly private bool $acknowledged
    ) {
    }

    public function isAcknowledged(): bool
    {
        return $this->acknowledged;
    }

    public function toArray(): array
    {
        return [
            'acknowledged' => $this->acknowledged,
        ];
    }
}
