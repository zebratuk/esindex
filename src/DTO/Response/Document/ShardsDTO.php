<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Document;

use Esindex\Contracts\Arrayable;

class ShardsDTO implements Arrayable
{
    /**
     * @param int $failed
     * @param int $successful
     * @param int $total
     * @param ShardFailureDTO[] $failures
     * @param ?int $skipped
     */
    public function __construct(
        readonly public int $failed,
        readonly public int $successful,
        readonly public int $total,
        readonly public array $failures,
        readonly public ?int $skipped = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'failed' => $this->failed,
            'successful' => $this->successful,
            'total' => $this->total,
            'failures' => array_map(
                static fn($v) => $v->toArray(),
                $this->failures
            ),
            'skipped' => $this->skipped,
        ];
    }
}
