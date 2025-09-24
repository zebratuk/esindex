<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Document;

use Esindex\DTO\Response\Document\ShardFailureDTO;
use Esindex\DTO\Response\Document\ShardsDTO;

class ShardsBuilder
{
    public static function buildShards(array $data): ?ShardsDTO
    {
        if (empty($data)) {
            return null;
        }

        return new ShardsDTO(
            failed: (int)$data['failed'],
            successful: (int)$data['successful'],
            total: (int)$data['total'],
            failures: self::buildShardsFailures($data['failures'] ?? []),
            skipped: isset($data['skipped']) ? (int)$data['skipped'] : null
        );
    }

    public static function buildShardsFailures(array $data): array
    {
        $result = [];

        foreach ($data as $row) {
            $result[] = new ShardFailureDTO(
                reason: $row['reason'],
                shard: (int)$row['shard'],
                index: $row['index'] ?? null,
                node: $row['node'] ?? null,
                status: $row['status'] ?? null
            );
        }

        return $result;
    }
}
