<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Behavior\Request\HasAllowNoIndices;
use Esindex\Behavior\Request\HasIgnoreUnavailable;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-get-alias
 */
class AliasGetInfoRequest extends AbstractIndexRequest
{
    use HasIgnoreUnavailable,
        HasAllowNoIndices;

    /**
     * @param string|string[]|null $name
     * @param string|string[]|null $index
     */
    public function __construct(
        readonly private string|array|null $name = null,
        readonly private string|array|null $index = null
    ) {
    }

    public function getName(): string|array|null
    {
        return $this->name;
    }

    public function getIndex(): string|array|null
    {
        return $this->index;
    }

    protected function buildData(array $data): array
    {
        $result = [];

        if (null !== $this->name) {
            $result['name'] = $this->name;
        }

        if (null !== $this->index) {
            $result[self::FIELD_INDEX] = $this->index;
        }

        return $result;
    }
}
