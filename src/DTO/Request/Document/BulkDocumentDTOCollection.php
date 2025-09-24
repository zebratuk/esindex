<?php
declare(strict_types=1);

namespace Esindex\DTO\Request\Document;

use Esindex\Contracts\Arrayable;
use Esindex\Enums\Request\Document\BulkActionEnum;

class BulkDocumentDTOCollection implements Arrayable
{
    /**
     * @var BulkDocumentDTO[]
     */
    private array $items = [];

    /**
     * @param BulkDocumentDTO[] $items
     */
    public function __construct(
        array $items = []
    ) {
        $this->setItems($items);
    }

    /**
     * @return BulkDocumentDTO[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param BulkDocumentDTO[] $values
     * @return $this
     */
    public function setItems(array $values): self
    {
        $this->items = [];
        foreach ($values as $value) {
            $this->addItem($value);
        }

        return $this;
    }

    public function addItem(BulkDocumentDTO $documentDTO): self
    {
        $this->items[] = $documentDTO;
        return $this;
    }

    public function count(): int
    {
        return \count($this->items);
    }

    public function toArray(): array
    {
        $result = [];

        foreach ($this->getItems() as $item) {
            $result[] = $this->buildActionItem($item);

            $data = $this->buildDataItem($item);
            if (!empty($data)) {
                $result[] = $data;
            }
        }

        return $result;
    }

    private function buildActionItem(BulkDocumentDTO $documentDTO): array
    {
        $action = $documentDTO->getAction();

        $result = [
            '_index' => $documentDTO->getIndex(),
            '_id' => $documentDTO->getId(),
            'routing' => $documentDTO->getRouting(),
            'if_primary_term' => $documentDTO->getIfPrimaryTerm(),
            'if_seq_no' => $documentDTO->getIfSeqNo(),
            'version' => $documentDTO->getVersion(),
            'version_type' => $documentDTO->getVersionType()?->value,
        ];

        if (BulkActionEnum::DELETE !== $action) {
            $result['require_alias'] = $documentDTO->getRequireAlias();
        }

        if (BulkActionEnum::UPDATE === $action) {
            $result['retry_on_conflict'] = $documentDTO->getRetryOnConflict();
        }

        if (
            BulkActionEnum::INDEX === $action
            || BulkActionEnum::CREATE === $action
        ) {
            $result['dynamic_templates'] = $documentDTO->getDynamicTemplates();
            $result['pipeline'] = $documentDTO->getPipeline();
        }

        $result = \array_filter(
            $result,
            static fn($v) => null !== $v
        );

        return [
            $action->value => $result
        ];
    }

    private function buildDataItem(BulkDocumentDTO $documentDTO): ?array
    {
        $action = $documentDTO->getAction();

        if (
            BulkActionEnum::INDEX === $action
            || BulkActionEnum::CREATE === $action
        ) {
            return $documentDTO->toArray();
        }

        if (BulkActionEnum::UPDATE === $action) {
            $result = [
                'doc' => $documentDTO->toArray(),
                'detect_noop' => $documentDTO->getDetectNoop(),
                'doc_as_upsert' => $documentDTO->getDocAsUpsert(),
                'script' => $documentDTO->getScript()?->toArray(),
                'scripted_upsert' => $documentDTO->getScriptedUpsert(),
                'upsert' => $documentDTO->getUpsert(),
                '_source' => $documentDTO->getSource(),
            ];

            return \array_filter(
                $result,
                static fn($v) => null !== $v
            );
        }

        return null;
    }
}
