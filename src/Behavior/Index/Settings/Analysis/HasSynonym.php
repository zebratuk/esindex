<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\FieldOption;

trait HasSynonym
{
    private ?string $optSynonymsSet = null;
    private ?string $optSynonymsPath = null;
    private array $optSynonyms = [];

    #[FieldOption('synonyms_set')]
    public function getSynonymsSet(): ?string
    {
        return $this->optSynonymsSet;
    }

    public function setSynonymsSet(?string $value): self
    {
        $this->optSynonymsSet = $value;
        return $this;
    }

    #[FieldOption('synonyms_path')]
    public function getSynonymsPath(): ?string
    {
        return $this->optSynonymsPath;
    }

    public function setSynonymsPath(?string $value): self
    {
        $this->optSynonymsPath = $value;
        return $this;
    }

    #[ArrayableFieldOption('synonyms')]
    public function getSynonyms(): array
    {
        return $this->optSynonyms;
    }

    public function setSynonyms(array $value): self
    {
        $this->optSynonyms = $value;
        return $this;
    }
}
