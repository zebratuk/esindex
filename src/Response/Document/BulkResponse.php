<?php
declare(strict_types=1);

namespace Esindex\Response\Document;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Response\Document\BulkItemDTO;

class BulkResponse implements ResponseInterface
{
    /**
     * @param bool $errors
     * @param BulkItemDTO[] $items
     * @param int $took
     * @param int|null $ingestTook
     */
    public function __construct(
        readonly public bool $errors,
        readonly public array $items,
        readonly public int $took,
        readonly public ?int $ingestTook = null
    ) {
    }

    public function toArray(): array
    {
        return [
            'errors' => $this->errors,
            'items' => array_map(
                static fn($v) => $v->toArray(),
                $this->items
            ),
            'took' => $this->took,
            'ingest_took' => $this->ingestTook,
        ];
    }
}
