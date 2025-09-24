<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-delete-alias
 */
class AliasDeleteRequest extends AbstractIndexRequest
{
    /**
     * @param string|string[] $index
     * @param string|string[] $alias
     */
    public function __construct(
        readonly private string|array $index,
        readonly private string|array $alias
    ) {
    }

    public function getIndex(): array|string
    {
        return $this->index;
    }

    public function getAlias(): array|string
    {
        return $this->alias;
    }

    protected function buildData(array $data): array
    {
        return [
            self::FIELD_INDEX => $this->index,
            'name' => $this->alias,
        ];
    }
}
