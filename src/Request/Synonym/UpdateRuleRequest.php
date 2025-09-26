<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-synonyms-put-synonym-rule
 */
class UpdateRuleRequest extends AbstractSynonymRequest
{
    public function __construct(
        readonly private string $setId,
        readonly private string $ruleId,
        readonly private string $synonyms
    ) {
    }

    public function getSetId(): string
    {
        return $this->setId;
    }

    public function getRuleId(): string
    {
        return $this->ruleId;
    }

    public function getSynonyms(): string
    {
        return $this->synonyms;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_SET_ID] = $this->setId;
        $data[self::FIELD_RULE_ID] = $this->ruleId;
        $data[self::FIELD_BODY] = [
            'synonyms' => $this->synonyms,
        ];

        return $data;
    }
}
