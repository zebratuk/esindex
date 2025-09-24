<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

use Esindex\DTO\Request\Synonym\SynonymDTO;

/**
 * @link
 */
class CreateSetRequest extends AbstractSynonymRequest
{
    /**
     * @var SynonymDTO[]
     */
    private array $synonymsSet = [];

    /**
     * @param string $id
     * @param SynonymDTO[] $synonymsSet
     */
    public function __construct(
        readonly private string $id,
        array $synonymsSet = []
    ) {
        $this->setSynonymsSet($synonymsSet);
    }

    /**
     * @return SynonymDTO[]
     */
    public function getSynonymsSet(): array
    {
        return $this->synonymsSet;
    }

    /**
     * @param SynonymDTO[] $values
     * @return $this
     */
    public function setSynonymsSet(array $values): self
    {
        $this->synonymsSet = [];
        foreach ($values as $value) {
            $this->addSynonymSet($value);
        }

        return $this;
    }

    public function addSynonymSet(SynonymDTO $synonym): self
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
