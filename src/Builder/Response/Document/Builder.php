<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Document;

use Esindex\Builder\Response\ShardsBuilder;
use Esindex\Common\ArrayUtil;
use Esindex\DTO\Response\Document\DocumentDTO;
use Esindex\Enums\Response\Document\ResultEnum;
use Esindex\Response\Document\BulkResponse;
use Esindex\Response\Document\CreateResponse;

class Builder
{
    public const FIELD_ID = '_id';
    public const FIELD_INDEX = '_index';
    public const FIELD_RESULT = 'result';
    public const FIELD_VERSION = '_version';
    public const FIELD_SHARDS = '_shards';
    public const FIELD_PRIMARY_TERM = '_primary_term';
    public const FIELD_SEQ_NO = '_seq_no';

    public static function buildCreateResponse(array $data): CreateResponse
    {
        $documentResponse = new DocumentDTO(
            index: $data[self::FIELD_INDEX],
            id: $data[self::FIELD_ID],
            result: ResultEnum::tryFrom($data[self::FIELD_RESULT]),
            version: (int)$data[self::FIELD_VERSION],
            shards: ShardsBuilder::buildShards($data[self::FIELD_SHARDS]),
            primaryTerm: ArrayUtil::getIntOrNull($data, self::FIELD_PRIMARY_TERM),
            seqNo: ArrayUtil::getIntOrNull($data, self::FIELD_SEQ_NO),
            forcedRefresh: ArrayUtil::getBoolOrNull($data, 'forced_refresh')
        );

        return new CreateResponse(
            $documentResponse
        );
    }

    public static function buildBulkResponse(array $data): BulkResponse
    {
        return new BulkResponse(
            errors: (bool)$data['errors'],
            items: BulkItemBuilder::buildBulkItems($data['items']),
            took: (int)$data['took'],
            ingestTook: ArrayUtil::getIntOrNull($data, 'ingest_took')
        );
    }
}
