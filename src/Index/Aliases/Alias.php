<?php
declare(strict_types=1);

namespace Esindex\Index\Aliases;

use Esindex\Contracts\Arrayable;

/**
 * @link https://www.elastic.co/docs/manage-data/data-store/aliases
 */
class Alias implements Arrayable, \JsonSerializable
{
    private ?string $indexRouting = null;
    private ?string $searchRouting = null;
    private ?string $routing = null;
    private array|Arrayable|null $filter = null;
    private ?bool $isHidden = null;
    private ?bool $isWriteIndex = null;

    public function __construct(
        readonly private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFilter(bool $asArray = false): array|Arrayable|null
    {
        if (
            $asArray
            && $this->filter instanceof Arrayable
        ) {
            return $this->filter->toArray();
        }

        return $this->filter;
    }

    public function setFilter(array|Arrayable|null $value): self
    {
        $this->filter = $value;
        return $this;
    }

    public function getIndexRouting(): ?string
    {
        return $this->indexRouting;
    }

    public function setIndexRouting(?string $value): self
    {
        $this->indexRouting = $value;
        return $this;
    }

    public function getIsHidden(): ?bool
    {
        return $this->isHidden;
    }

    public function setIsHidden(?bool $value): self
    {
        $this->isHidden = $value;
        return $this;
    }

    public function getIsWriteIndex(): ?bool
    {
        return $this->isWriteIndex;
    }

    public function setIsWriteIndex(?bool $value): self
    {
        $this->isWriteIndex = $value;
        return $this;
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

    public function getSearchRouting(): ?string
    {
        return $this->searchRouting;
    }

    public function setSearchRouting(?string $value): self
    {
        $this->searchRouting = $value;
        return $this;
    }

    public function toArray(): array
    {
        $result = [];

        $filter = $this->getFilter(true);
        if (!empty($filter)) {
            $result['filter'] = $filter;
        }

        if (null !== $this->isHidden) {
            $result['is_hidden '] = $this->isHidden;
        }

        if (null !== $this->isWriteIndex) {
            $result['is_write_index'] = $this->isWriteIndex;
        }

        if (!empty($this->indexRouting)) {
            $result['index_routing'] = $this->indexRouting;
        }

        if (!empty($this->routing)) {
            $result['routing'] = $this->routing;
        }

        if (!empty($this->searchRouting)) {
            $result['search_routing'] = $this->searchRouting;
        }

        return $result;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
