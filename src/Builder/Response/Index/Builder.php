<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Index;

use Esindex\DTO\Response\Index\IndexDTO;
use Esindex\Response\Index\AliasCreateResponse;
use Esindex\Response\Index\AliasDeleteResponse;
use Esindex\Response\Index\AliasGetInfoResponse;
use Esindex\Response\Index\CreateResponse;
use Esindex\Response\Index\DeleteResponse;
use Esindex\Response\Index\GetInfoResponse;

/**
 * Build objects from Elasticsearch client's response data
 */
class Builder
{
    public const FIELD_ACKNOWLEDGED = 'acknowledged';

    /**
     * @param array $data
     * @return CreateResponse
     */
    static public function buildCreateResponse(array $data): CreateResponse
    {
        return new CreateResponse(
            index: $data['index'],
            shardsAcknowledged: (bool)$data['shards_acknowledged'],
            acknowledged: (bool)$data[self::FIELD_ACKNOWLEDGED]
        );
    }

    /**
     * @param array $data
     * @return GetInfoResponse[]
     */
    static public function buildGetInfoResponse(array $data): array
    {
        $result = [];
        foreach ($data as $indexName => $indexData) {
            $indexDTO = new IndexDTO(
                index: $indexName,
                aliases: AliasBuilder::buildAliases($indexData['aliases'] ?? []),
                mappings: $indexData['mappings'] ?? null,
                settings: $indexData['settings'] ?? null,
                defaults: $indexData['defaults'] ?? null,
                dataStream: $indexData['data_stream'] ?? null,
                lifecycle: $indexData['lifecycle'] ?? null
            );

            $result[] = new GetInfoResponse(
                index: $indexName,
                indexData: $indexDTO
            );
        }

        return $result;
    }

    /**
     * @param array $data
     * @return DeleteResponse
     */
    static public function buildDeleteResponse(array $data): DeleteResponse
    {
        return new DeleteResponse(
            acknowledged: (bool)$data[self::FIELD_ACKNOWLEDGED],
            shards: $data['_shards'] ?? null
        );
    }

    /**
     * @param array $data
     * @return AliasCreateResponse
     */
    static public function buildAliasCreateResponse(array $data): AliasCreateResponse
    {
        return new AliasCreateResponse((bool)$data[self::FIELD_ACKNOWLEDGED]);
    }

    /**
     * @param array $data
     * @return AliasDeleteResponse
     */
    static public function buildAliasDeleteResponse(array $data): AliasDeleteResponse
    {
        return new AliasDeleteResponse((bool)$data[self::FIELD_ACKNOWLEDGED]);
    }

    /**
     * @param array $data
     * @return AliasGetInfoResponse[]
     */
    static public function buildAliasGetInfoResponse(array $data): array
    {
        $result = [];
        foreach ($data as $indexName => $indexData) {
            $indexDTO = new IndexDTO(
                index: $indexName,
                aliases: AliasBuilder::buildAliases($indexData['aliases'] ?? [])
            );

            $result[] = new AliasGetInfoResponse(
                index: $indexName,
                indexData: $indexDTO
            );
        }

        return $result;
    }
}
