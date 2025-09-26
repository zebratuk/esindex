<?php
declare(strict_types=1);

namespace Esindex\Response\Synonym;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Response\Synonym\SynonymSetDTO;

class GetSynonymsSetsResponse implements ResponseInterface
{
    /**
     * @param int $count
     * @param SynonymSetDTO[] $results
     */
    public function __construct(
        readonly private int $count,
        readonly private array $results
    ) {
    }

    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return SynonymSetDTO[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    public function toArray(): array
    {
        return [
            'count' => $this->count,
            'results' => array_map(
                static fn($v) => $v->toArray(),
                $this->results
            )
        ];
    }
}
