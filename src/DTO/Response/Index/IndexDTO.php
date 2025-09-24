<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Index;

use Esindex\Contracts\Arrayable;
use Esindex\Index\Aliases;

class IndexDTO implements Arrayable
{
    public function __construct(
        readonly private string $index,
        readonly private ?Aliases $aliases = null,
        readonly private ?array $mappings = null,
        readonly private ?array $settings = null,
        readonly private ?array $defaults = null,
        readonly private ?string $dataStream = null,
        readonly private ?array $lifecycle = null
    ) {
    }

    public function getIndex(): string
    {
        return $this->index;
    }

    public function getAliases(): ?Aliases
    {
        return $this->aliases;
    }

    public function getMappings(): ?array
    {
        return $this->mappings;
    }

    public function getSettings(): ?array
    {
        return $this->settings;
    }

    public function getDefaults(): ?array
    {
        return $this->defaults;
    }

    public function getDataStream(): ?string
    {
        return $this->dataStream;
    }

    public function getLifecycle(): ?array
    {
        return $this->lifecycle;
    }

    public function toArray(): array
    {
        return [
            'aliases' => $this->aliases,
            'mappings' => $this->mappings,
            'settings' => $this->settings,
            'defaults' => $this->defaults,
            'lifecycle' => $this->lifecycle,
            'dataStream' => $this->dataStream,
        ];
    }
}
