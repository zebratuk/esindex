<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Synonym;

use Esindex\Contracts\Arrayable;

class ReloadDetailDTO implements Arrayable, \JsonSerializable
{
    public function __construct(
        readonly public string $index,
        readonly public array $reloadedAnalyzers,
        readonly public array $reloadedNodeIds
    ) {
    }

    public function toArray(): array
    {
        return [
            'index' => $this->index,
            'reloaded_analyzers' => $this->reloadedAnalyzers,
            'reloaded_node_ids' => $this->reloadedNodeIds,
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
