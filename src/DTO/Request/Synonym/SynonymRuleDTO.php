<?php
declare(strict_types=1);

namespace Esindex\DTO\Request\Synonym;

use Esindex\Contracts\Arrayable;

class SynonymRuleDTO implements Arrayable, \JsonSerializable
{
    public function __construct(
        readonly public string $synonyms,
        readonly public ?string $id = null
    ) {
    }

    public function toArray(): array
    {
        $result = [
            'synonyms' => $this->synonyms
        ];

        if (null !== $this->id) {
            $result['id'] = $this->id;
        }

        return $result;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
