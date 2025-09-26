<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Document;

use Esindex\Contracts\Arrayable;
use Esindex\DTO\Response\ShardsDTO;
use Esindex\Enums\Request\Document\BulkActionEnum;
use Esindex\Enums\Response\Document\ResultEnum;

class BulkItemDTO implements Arrayable
{
    public function __construct(
        readonly public ?BulkActionEnum $action,
        readonly public string $index,
        readonly public int $status,
        readonly public ?string $id = null,
        readonly public ?string $failureStore = null,
        readonly public ?BulkItemErrorDTO $error = null,
        readonly public ?int $primaryTerm = null,
        readonly public ?ResultEnum $result = null,
        readonly public ?int $seqNo = null,
        readonly public ?int $version = null,
        readonly public ?ShardsDTO $shards = null,
        readonly public ?BulkItemGetDTO $get = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'action' => $this->action?->value,
            'index' => $this->index,
            'status' => $this->status,
            'id' => $this->id,
            'failure_store' => $this->failureStore,
            'error' => $this->error?->toArray(),
            'primary_term' => $this->primaryTerm,
            'result' => $this->result?->value,
            'seq_no' => $this->seqNo,
            'version' => $this->version,
            'shards' => $this->shards?->toArray(),
            'get' => $this->get?->toArray(),
        ];
    }
}
