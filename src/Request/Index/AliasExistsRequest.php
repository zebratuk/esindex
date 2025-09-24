<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Behavior\Request\HasIgnoreUnavailable;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-exists-alias
 */
class AliasExistsRequest extends AbstractIndexRequest
{
    use HasIgnoreUnavailable;

    /**
     * @param string|array $name
     * @param string|string[]|null $index
     */
    public function __construct(
        readonly private string|array $name,
        readonly private string|array|null $index = null
    ) {
    }

    public function getName(): string|array
    {
        return $this->name;
    }

    public function getIndex(): string|array|null
    {
        return $this->index;
    }

    protected function buildData(array $data): array
    {
        $result = [
            'name' => $this->name,
        ];

        if (null !== $this->index) {
            $result[self::FIELD_INDEX] = $this->index;
        }

        return $result;
    }
}
