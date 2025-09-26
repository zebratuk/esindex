<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Synonym;

use Esindex\Contracts\Arrayable;
use Esindex\DTO\Response\ShardsDTO;

class ReloadAnalyzersDetailsDTO implements Arrayable, \JsonSerializable
{
    /**
     * @param ReloadDetailDTO[] $reloadDetails
     * @param ShardsDTO $shards
     */
    public function __construct(
        readonly public array $reloadDetails,
        readonly public ShardsDTO $shards
    ) {
    }

    /**
     * @return ReloadDetailDTO[]
     */
    public function getReloadDetails(): array
    {
        return $this->reloadDetails;
    }

    public function getShards(): ShardsDTO
    {
        return $this->shards;
    }

    public function toArray(): array
    {
        return [
            'reload_details' => array_map(
                static fn($v) => $v->toArray(),
                $this->reloadDetails
            ),
            'shards' => $this->shards->toArray(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
