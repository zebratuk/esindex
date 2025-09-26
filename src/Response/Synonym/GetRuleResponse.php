<?php
declare(strict_types=1);

namespace Esindex\Response\Synonym;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Request\Synonym\SynonymRuleDTO;

class GetRuleResponse implements ResponseInterface
{
    public function __construct(
        readonly private SynonymRuleDTO $rule
    ) {
    }

    public function getRule(): SynonymRuleDTO
    {
        return $this->rule;
    }

    public function getId(): string
    {
        return $this->rule->id;
    }

    public function getSynonyms(): string
    {
        return $this->rule->synonyms;
    }

    public function toArray(): array
    {
        return $this->rule->toArray();
    }
}
