<?php
declare(strict_types=1);

namespace Esindex\Request\Document;

use Esindex\Behavior\Request\HasIncludeSourceOnError;
use Esindex\Behavior\Request\HasPipeline;
use Esindex\Behavior\Request\HasRefresh;
use Esindex\Behavior\Request\HasRequireAlias;
use Esindex\Behavior\Request\HasRouting;
use Esindex\Behavior\Request\HasVersion;
use Esindex\Behavior\Request\HasWaitForActiveShards;
use Esindex\DTO\Request\Document\DocumentDTO;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-create
 */
class CreateRequest extends AbstractDocumentRequest
{
    use HasWaitForActiveShards,
        HasVersion,
        HasIncludeSourceOnError,
        HasRequireAlias,
        HasPipeline,
        HasRefresh,
        HasRouting;

    public function __construct(
        readonly private string $index,
        readonly private DocumentDTO $document,
        readonly private ?string $id = null
    ) {
    }

    protected function buildData(array $data): array
    {
        $result[self::FIELD_INDEX] = $this->index;

        $id = $this->id ?? $this->document->getId();
        if (null !== $id) {
            $result[self::FIELD_ID] = $id;
        }

        $result[self::FIELD_BODY] = $this->document->toArray();

        return $result;
    }
}
