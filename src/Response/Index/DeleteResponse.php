<?php
declare(strict_types=1);

namespace Esindex\Response\Index;

use Esindex\Contracts\ResponseInterface;

class DeleteResponse implements ResponseInterface
{
    public function __construct(
        readonly private bool $acknowledged,
        readonly private ?array $shards = null
    ) {
    }

    public function isAcknowledged(): bool
    {
        return $this->acknowledged;
    }

    public function getShards(): ?array
    {
        return $this->shards;
    }

    public function toArray(): array
    {
        return [
            'acknowledged' => $this->acknowledged,
            'shards' => $this->shards,
        ];
    }
}
