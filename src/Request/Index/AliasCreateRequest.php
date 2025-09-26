<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Index\Aliases\Alias;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-put-alias
 */
class AliasCreateRequest extends AbstractIndexRequest
{
    public function __construct(
        readonly private string|array $index,
        readonly private Alias $alias
    ) {
    }

    public function getIndex(): array|string
    {
        return $this->index;
    }

    public function getAlias(): Alias
    {
        return $this->alias;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_INDEX] = $this->index;
        $data['name'] = $this->alias->getName();
        $data[self::FIELD_BODY] = $this->alias->toArray();

        return $data;
    }
}
