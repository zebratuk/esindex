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

    protected function buildData(array $data): array
    {
        return [
            self::FIELD_INDEX => $this->index,
            'name' => $this->alias->getName(),
            self::FIELD_BODY => $this->alias->toArray(),
        ];
    }
}
