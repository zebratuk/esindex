<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Document;

use Esindex\Contracts\Arrayable;
use Esindex\Enums\Response\Document\ResultEnum;

class DocumentDTO implements Arrayable
{
    public function __construct(
        readonly public string $index,
        readonly public string $id,
        readonly public ResultEnum $result,
        readonly public int $version,
        readonly public ShardsDTO $shards,
        readonly public ?int $primaryTerm = null,
        readonly public ?int $seqNo = null,
        readonly public ?bool $forcedRefresh = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'index' => $this->index,
            'id' => $this->id,
            'result' => $this->result->value,
            'version' => $this->version,
            'shards' => $this->shards->toArray(),
            'primary_term' => $this->primaryTerm,
            'seq_no' => $this->seqNo,
            'forced_refresh' => $this->forcedRefresh,
        ];
    }
}
