<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

use Esindex\DTO\Request\Synonym\SynonymRuleDTO;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-synonyms-put-synonym
 */
class CreateSetRequest extends AbstractSynonymRequest
{
    /**
     * @var SynonymRuleDTO[]
     */
    private array $synonymsSet = [];

    /**
     * @param string $id
     * @param SynonymRuleDTO[] $synonymsSet
     */
    public function __construct(
        readonly private string $id,
        array $synonymsSet = []
    ) {
        $this->setSynonymsSet($synonymsSet);
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return SynonymRuleDTO[]
     */
    public function getSynonymsSet(): array
    {
        return $this->synonymsSet;
    }

    /**
     * @param SynonymRuleDTO[] $values
     * @return $this
     */
    public function setSynonymsSet(array $values): self
    {
        $this->synonymsSet = [];
        foreach ($values as $value) {
            $this->addSynonymSetRule($value);
        }

        return $this;
    }

    public function addSynonymSetRule(SynonymRuleDTO $synonym): self
    {
        $this->synonymsSet[] = $synonym;
        return $this;
    }

    protected function buildData(array $data): array
    {
        $synonymsSet = array_map(
            static fn($v) => $v->toArray(),
            $this->synonymsSet
        );

        $data[self::FIELD_ID] = $this->id;
        $data[self::FIELD_BODY] = [
            'synonyms_set' => $synonymsSet,
        ];

        return $data;
    }
}
