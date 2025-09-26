<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Synonym;

use Esindex\Builder\Response\ShardsBuilder;
use Esindex\DTO\Response\Synonym\ReloadAnalyzersDetailsDTO;
use Esindex\DTO\Response\Synonym\ReloadDetailDTO;

class ResultBuilder
{
    public static function buildReloadAnalyzersDetails(array $data): ReloadAnalyzersDetailsDTO
    {
        $details = array_map(
            static fn($v) => ResultBuilder::buildReloadDetailDTO($v),
            $data['reload_details']
        );

        return new ReloadAnalyzersDetailsDTO(
            reloadDetails: $details,
            shards: ShardsBuilder::buildShards($data['_shards'])
        );
    }

    public static function buildReloadDetailDTO(array $data): ReloadDetailDTO
    {
        return new ReloadDetailDTO(
            index: $data['index'],
            reloadedAnalyzers: $data['reloaded_analyzers'],
            reloadedNodeIds: $data['reloaded_node_ids']
        );
    }
}
