<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Document;

use Esindex\Contracts\Arrayable;

class ShardFailureDTO implements Arrayable
{
    public function __construct(
        readonly public array $reason,
        readonly public int $shard,
        readonly public ?string $index = null,
        readonly public ?string $node = null,
        readonly public ?string $status = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'reason' => $this->reason,
            'shard' => $this->shard,
            'index' => $this->index,
            'node' => $this->node,
            'status' => $this->status,
        ];
    }
}
