<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-synonyms-delete-synonym
 */
class DeleteSetRequest extends AbstractSynonymRequest
{
    public function __construct(
        readonly private string $id
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_ID] = $this->id;
        return $data;
    }
}
