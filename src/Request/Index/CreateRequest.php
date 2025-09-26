<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Behavior\Request\HasTimeout;
use Esindex\Behavior\Request\HasWaitForActiveShards;
use Esindex\Index\Aliases;
use Esindex\Index\Mappings;
use Esindex\Index\Settings;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-create
 */
class CreateRequest extends AbstractIndexRequest
{
    use HasWaitForActiveShards,
        HasTimeout;

    public function __construct(
        readonly private string $name,
        private ?Mappings $mappings = null,
        private ?Settings $settings = null,
        private ?Aliases $aliases = null
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMappings(): ?Mappings
    {
        return $this->mappings;
    }

    public function setMappings(?Mappings $value): self
    {
        $this->mappings = $value;
        return $this;
    }

    public function getAliases(): ?Aliases
    {
        return $this->aliases;
    }

    public function setAliases(?Aliases $value): self
    {
        $this->aliases = $value;
        return $this;
    }

    public function getSettings(): ?Settings
    {
        return $this->settings;
    }

    public function setSettings(?Settings $value): self
    {
        $this->settings = $value;
        return $this;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_INDEX] = $this->name;

        $data[self::FIELD_BODY] = [
            'aliases' => $this->aliases?->toArray(),
            'settings' => $this->settings?->toArray(),
            'mappings' => $this->mappings?->toArray(),
        ];

        return $data;
    }
}
