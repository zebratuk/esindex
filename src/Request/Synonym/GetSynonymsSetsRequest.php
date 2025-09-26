<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-synonyms-get-synonyms-sets
 */
class GetSynonymsSetsRequest extends AbstractSynonymRequest
{
    public function __construct(
        private ?int $from = null,
        private ?int $size = null
    ) {
    }

    public function getFrom(): ?int
    {
        return $this->from;
    }

    public function setFrom(?int $value): self
    {
        $this->from = $value;
        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $value): self
    {
        $this->size = $value;
        return $this;
    }

    protected function buildData(array $data): array
    {
        $data['from'] = $this->from;
        $data['size'] = $this->size;
        return $data;
    }
}
