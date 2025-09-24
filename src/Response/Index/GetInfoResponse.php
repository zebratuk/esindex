<?php
declare(strict_types=1);

namespace Esindex\Response\Index;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Response\Index\IndexDTO;

class GetInfoResponse implements ResponseInterface
{
    public function __construct(
        readonly private string $index,
        readonly private IndexDTO $indexData
    ) {
    }

    public function getIndex(): string
    {
        return $this->index;
    }

    public function getIndexData(): IndexDTO
    {
        return $this->indexData;
    }

    public function toArray(): array
    {
        return $this->indexData->toArray();
    }
}
