<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Request\VersionTypeEnum;

trait HasVersion
{
    private ?int $optVersion = null;
    private ?VersionTypeEnum $optVersionType = null;

    #[FieldOption('version')]
    public function getVersion(): ?int
    {
        return $this->optVersion;
    }

    public function setVersion(?int $value): self
    {
        $this->optVersion = $value;
        return $this;
    }

    #[EnumFieldOption('version_type')]
    public function getVersionType(): ?VersionTypeEnum
    {
        return $this->optVersionType;
    }

    public function setVersionType(?VersionTypeEnum $value): self
    {
        $this->optVersionType = $value;
        return $this;
    }
}
