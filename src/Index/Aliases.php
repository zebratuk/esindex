<?php
declare(strict_types=1);

namespace Esindex\Index;

use Esindex\Contracts\Arrayable;
use Esindex\Index\Aliases\Alias;

class Aliases implements Arrayable, \JsonSerializable
{
    /**
     * @var array<string,Alias>
     */
    private array $aliases = [];

    /**
     * @param Alias[]|string[] $aliases
     */
    public function __construct(
        array $aliases = []
    ) {
        $this->setAliases($aliases);
    }

    /**
     * @param Alias[]|string[] $values
     * @return $this
     */
    public function setAliases(array $values): self
    {
        $this->aliases = [];
        foreach ($values as $value) {
            $this->addAlias($value);
        }

        return $this;
    }

    public function addAlias(Alias|string $alias): self
    {
        if (is_string($alias)) {
            $alias = new Alias($alias);
        }

        $this->aliases[$alias->getName()] = $alias;

        return $this;
    }

    public function removeAlias(string $name): self
    {
        if (isset($this->aliases[$name])) {
            unset($this->aliases[$name]);
        }

        return $this;
    }

    /**
     * @return array<string,Alias>
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function getAlias(string $name): ?Alias
    {
        return $this->aliases[$name] ?? null;
    }

    public function toArray(): array
    {
        return array_map(
            static fn($v) => $v->toArray() ?: new \stdClass(),
            $this->aliases
        );
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
