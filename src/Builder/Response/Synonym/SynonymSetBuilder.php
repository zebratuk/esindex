<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Synonym;

use Esindex\DTO\Request\Synonym\SynonymRuleDTO;
use Esindex\DTO\Response\Synonym\SynonymSetDTO;

class SynonymSetBuilder
{
    public static function buildSynonymRuleDTO(array $data): SynonymRuleDTO
    {
        return new SynonymRuleDTO(
            synonyms: $data['synonyms'],
            id: $data['id']
        );
    }

    /**
     * @param array $data
     * @return SynonymRuleDTO[]
     */
    public static function buildRuleCollection(array $data): array
    {
        return array_map(
            static fn($v) => SynonymSetBuilder::buildSynonymRuleDTO($v),
            $data
        );
    }

    public static function buildSynonymSetDTO(array $data): SynonymSetDTO
    {
        return new SynonymSetDTO(
            synonymsSet: $data['synonyms_set'],
            count: (int)$data['count']
        );
    }

    /**
     * @param array $data
     * @return SynonymSetDTO[]
     */
    public static function buildSynonymSetCollection(array $data): array
    {
        return array_map(
            static fn($v) => SynonymSetBuilder::buildSynonymSetDTO($v),
            $data
        );
    }
}
