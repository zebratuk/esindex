<?php
declare(strict_types=1);

namespace Esindex\DTO\Request\Document;

use Esindex\Enums\Request\Document\BulkActionEnum;
use Esindex\Enums\Request\VersionTypeEnum;
use Esindex\Index\Unit\ScriptUnit;

class BulkDocumentDTO extends DocumentDTO
{
    private ?string $routing = null;
    private ?int $ifPrimaryTerm = null;
    private ?int $ifSeqNo = null;
    private ?array $dynamicTemplates = null;
    private ?string $pipeline = null;
    private ?bool $requireAlias = null;
    private ?int $retryOnConflict = null;
    private ?bool $detectNoop = null;
    private ?bool $docAsUpsert = null;
    private ?ScriptUnit $script = null;
    private ?bool $scriptedUpsert = null;
    private bool|array|null $source = null;

    public function __construct(
        readonly private string $index,
        readonly private BulkActionEnum $action,
        array $data = [],
        ?string $id = null,
        private ?int $version = null,
        private ?VersionTypeEnum $versionType = null,
        private ?array $upsert = null
    ) {
        parent::__construct($data, $id);
    }

    public function getIndex(): string
    {
        return $this->index;
    }

    public function getAction(): BulkActionEnum
    {
        return $this->action;
    }

    public function getRouting(): ?string
    {
        return $this->routing;
    }

    public function setRouting(?string $value): self
    {
        $this->routing = $value;
        return $this;
    }

    public function getIfPrimaryTerm(): ?int
    {
        return $this->ifPrimaryTerm;
    }

    public function setIfPrimaryTerm(?int $value): self
    {
        $this->ifPrimaryTerm = $value;
        return $this;
    }

    public function getIfSeqNo(): ?int
    {
        return $this->ifSeqNo;
    }

    public function setIfSeqNo(?int $value): self
    {
        $this->ifSeqNo = $value;
        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $value): self
    {
        $this->version = $value;
        return $this;
    }

    public function getVersionType(): ?VersionTypeEnum
    {
        return $this->versionType;
    }

    public function setVersionType(?VersionTypeEnum $value): self
    {
        $this->versionType = $value;
        return $this;
    }

    public function getDynamicTemplates(): ?array
    {
        return $this->dynamicTemplates;
    }

    public function setDynamicTemplates(?array $value): self
    {
        $this->dynamicTemplates = $value;
        return $this;
    }

    public function getPipeline(): ?string
    {
        return $this->pipeline;
    }

    public function setPipeline(?string $value): self
    {
        $this->pipeline = $value;
        return $this;
    }

    public function getRequireAlias(): ?bool
    {
        return $this->requireAlias;
    }

    public function setRequireAlias(?bool $value): self
    {
        $this->requireAlias = $value;
        return $this;
    }

    public function getRetryOnConflict(): ?int
    {
        return $this->retryOnConflict;
    }

    public function setRetryOnConflict(?int $value): self
    {
        $this->retryOnConflict = $value;
        return $this;
    }

    public function getDetectNoop(): ?bool
    {
        return $this->detectNoop;
    }

    public function setDetectNoop(?bool $value): self
    {
        $this->detectNoop = $value;
        return $this;
    }

    public function getDocAsUpsert(): ?bool
    {
        return $this->docAsUpsert;
    }

    public function setDocAsUpsert(?bool $value): self
    {
        $this->docAsUpsert = $value;
        return $this;
    }

    public function getScript(): ?ScriptUnit
    {
        return $this->script;
    }

    public function setScript(?ScriptUnit $value): self
    {
        $this->script = $value;
        return $this;
    }

    public function getScriptedUpsert(): ?bool
    {
        return $this->scriptedUpsert;
    }

    public function setScriptedUpsert(?bool $value): self
    {
        $this->scriptedUpsert = $value;
        return $this;
    }

    public function getUpsert(): ?array
    {
        return $this->upsert;
    }

    public function setUpsert(?array $value): self
    {
        $this->upsert = $value;
        return $this;
    }

    public function getSource(): bool|array|null
    {
        return $this->source;
    }

    public function setSource(bool|array|null $value): self
    {
        $this->source = $value;
        return $this;
    }
}
