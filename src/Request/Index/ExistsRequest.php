<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Behavior\Request\HasIgnoreUnavailable;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-exists
 */
class ExistsRequest extends AbstractIndexRequest
{
    use HasIgnoreUnavailable;

    /**
     * @param string|string[] $index
     */
    public function __construct(
        readonly private string|array $index
    ) {
    }

    /**
     * @return string[]|string
     */
    public function getIndex(): array|string
    {
        return $this->index;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_INDEX] = $this->index;

        return $data;
    }
}
