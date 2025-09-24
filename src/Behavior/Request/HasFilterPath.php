<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\ArrayableFieldOption;

trait HasFilterPath
{
    private string|array|null $optFilterPath = null;

    #[ArrayableFieldOption('filter_path')]
    public function getFilterPath(): array|string|null
    {
        return $this->optFilterPath;
    }

    public function setFilterPath(array|string|null $value): self
    {
        $this->optFilterPath = $value;
        return $this;
    }

    public function addFilterPath(string $value): self
    {
        $value = trim($value);
        if (empty($value)) {
            return $this;
        }

        $this->optFilterPath = match(true) {
            is_null($this->optFilterPath) => [],
            is_string($this->optFilterPath) => [$this->optFilterPath],
            default => $this->optFilterPath
        };

        $this->optFilterPath[] = $value;

        return $this;
    }
}
