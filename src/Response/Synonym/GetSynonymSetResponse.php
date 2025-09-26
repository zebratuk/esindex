<?php
declare(strict_types=1);

namespace Esindex\Response\Synonym;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Request\Synonym\SynonymRuleDTO;

class GetSynonymSetResponse implements ResponseInterface
{
    /**
     * @param int $count
     * @param SynonymRuleDTO[] $synonymsSet
     */
    public function __construct(
        readonly private int $count,
        readonly private array $synonymsSet
    ) {
    }

    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return SynonymRuleDTO[]
     */
    public function getSynonymsSet(): array
    {
        return $this->synonymsSet;
    }

    public function toArray(): array
    {
        return [
            'count' => $this->count,
            'synonyms_set' => array_map(
                static fn($v) => $v->toArray(),
                $this->synonymsSet
            ),
        ];
    }
}
