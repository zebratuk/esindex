<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-synonyms-delete-synonym-rule
 */
class DeleteRuleRequest extends AbstractSynonymRequest
{
    public function __construct(
        readonly private string $setId,
        readonly private string $ruleId
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

    protected function buildData(array $data): array
    {
        $data[self::FIELD_SET_ID] = $this->setId;
        $data[self::FIELD_RULE_ID] = $this->ruleId;
        return $data;
    }
}
