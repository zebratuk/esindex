<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Synonym;

use Esindex\Contracts\Arrayable;

class SynonymSetDTO implements Arrayable, \JsonSerializable
{
    public function __construct(
        readonly public string $synonymsSet,
        readonly public int $count
    ) {
    }

    public function toArray(): array
    {
        return [
            'synonyms_set' => $this->synonymsSet,
            'count' => $this->count,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
