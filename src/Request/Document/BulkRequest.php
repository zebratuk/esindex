<?php
declare(strict_types=1);

namespace Esindex\Request\Document;

use Esindex\Behavior\Request\HasFilterPath;
use Esindex\Behavior\Request\HasPipeline;
use Esindex\Behavior\Request\HasRefresh;
use Esindex\Behavior\Request\HasRequireAlias;
use Esindex\Behavior\Request\HasTimeout;
use Esindex\Behavior\Request\HasWaitForActiveShards;
use Esindex\DTO\Request\Document\BulkDocumentDTOCollection;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-bulk
 */
class BulkRequest extends AbstractDocumentRequest
{
    use HasWaitForActiveShards,
        HasRefresh,
        HasTimeout,
        HasPipeline,
        HasRequireAlias,
        HasFilterPath;

    public function __construct(
        readonly private BulkDocumentDTOCollection $collection,
        private ?string $index = null
    ) {
    }

    public function getIndex(): ?string
    {
        return $this->index;
    }

    public function setIndex(?string $value): self
    {
        $this->index = $value;
        return $this;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_BODY] = $this->collection->toArray();
        $data[self::FIELD_INDEX] = $this->index;

        return $data;
    }
}
