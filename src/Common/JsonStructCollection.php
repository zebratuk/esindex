<?php
declare(strict_types=1);

namespace Esindex\Common;

use Esindex\Contracts\Arrayable;
use Esindex\Contracts\JsonStructInterface;
use Esindex\Exceptions\AssertException;

/**
 * @template T
 */
class JsonStructCollection implements Arrayable, \JsonSerializable
{
    /**
     * @var T[]|array<string,null>
     */
    private array $items = [];

    public function __construct(
        array $items = []
    ) {
        $this->setItems($items);
    }

    /**
     * @return T[]|array<string,null>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param T[] $items
     * @return self
     */
    public function setItems(array $items): self
    {
        $this->items = [];
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @param T $item
     * @return self
     * @throws AssertException
     */
    public function addItem(JsonStructInterface $item): self
    {
        $this->assertItem($item);

        $this->items[$item->getName()] = $item;
        return $this;
    }

    public function removeItem(string $name): self
    {
        if (isset($this->items[$name])) {
            unset($this->items[$name]);
        }

        return $this;
    }

    public function markItemAsNull(string $name): self
    {
        $this->items[$name] = null;
        return $this;
    }

    public function count(): int
    {
        return \count($this->items);
    }

    /**
     * @param T $item
     * @return void
     * @throws AssertException
     */
    protected function assertItem(JsonStructInterface $item): void
    {
    }

    public function toArray(): array
    {
        return \array_map(
            static fn($item) => $item?->toArray(),
            $this->getItems()
        );
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
