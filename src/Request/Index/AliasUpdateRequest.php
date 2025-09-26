<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\DTO\Request\Index\BulkAliasDTO;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-update-aliases
 */
class AliasUpdateRequest extends AbstractIndexRequest
{
    /**
     * @var BulkAliasDTO[]
     */
    private array $actions = [];

    public function __construct(
        array $actions = []
    ) {
        $this->setActions($actions);
    }

    /**
     * @return BulkAliasDTO[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    /**
     * @param BulkAliasDTO[] $values
     * @return $this
     */
    public function setActions(array $values): self
    {
        $this->actions = [];
        foreach ($values as $value) {
            $this->addAction($value);
        }

        return $this;
    }

    public function addAction(BulkAliasDTO $action): self
    {
        $this->actions[] = $action;
        return $this;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_BODY] = [
            'actions' => array_map(
                static fn($v) => $v->toArray(),
                $this->actions
            ),
        ];

        return $data;
    }
}
