<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Document;

use Esindex\Common\ArrayUtil;
use Esindex\DTO\Response\Document\BulkItemDTO;
use Esindex\DTO\Response\Document\BulkItemErrorDTO;
use Esindex\DTO\Response\Document\BulkItemGetDTO;
use Esindex\Enums\Request\Document\BulkActionEnum;
use Esindex\Enums\Response\Document\ResultEnum;

class BulkItemBuilder
{
    public static function buildBulkItems(array $data): array
    {
        $result = [];
        foreach ($data as $action => $row) {
            $result[] = self::buildBulkItemDTO($action, $row);
        }

        return $result;
    }

    public static function buildBulkItemDTO(string $action, array $data): BulkItemDTO
    {
        return new BulkItemDTO(
            action: BulkActionEnum::tryFrom($action),
            index: $data['_index'],
            status: (int)$data['status'],
            id: $data['_id'] ?? null,
            failureStore: $data['failure_store'] ?? null,
            error: self::buildBulkItemErrorDTO($data['error'] ?? []),
            primaryTerm: ArrayUtil::getIntOrNull($data, '_primary_term'),
            result: isset($data['result']) ? ResultEnum::tryFrom($data['result']) : null,
            seqNo: ArrayUtil::getIntOrNull($data, '_seq_no'),
            version: ArrayUtil::getIntOrNull($data, '_version'),
            shards: ShardsBuilder::buildShards($data['_shards'] ?? []),
            get: self::buildBulkItemGetDTO($data['get'] ?? [])
        );
    }

    public static function buildBulkItemErrorDTO(array $data): ?BulkItemErrorDTO
    {
        if (empty($data)) {
            return null;
        }

        return new BulkItemErrorDTO($data);
    }

    public static function buildBulkItemGetDTO(array $data): ?BulkItemGetDTO
    {
        if (empty($data)) {
            return null;
        }

        return new BulkItemGetDTO($data);
    }
}
