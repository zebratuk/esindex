<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\JsonStructInterface;

class Source implements JsonStructInterface, \JsonSerializable
{
    public const NAME = '_source';

    private ?bool $isEnabled = null;

    /**
     * @var string[]
     */
    private array $includes = [];

    /**
     * @var string[]
     */
    private array $excludes = [];

    public function getName(): string
    {
        return self::NAME;
    }

    #[BooleanFieldOption('enabled')]
    public function getIsEnabled(): ?bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(?bool $value): self
    {
        $this->isEnabled = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('includes')]
    public function getIncludes(): array
    {
        return $this->includes;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setIncludes(array $values): self
    {
        $this->includes = [];
        foreach ($values as $value) {
            $this->addInclude($value);
        }

        return $this;
    }

    public function addInclude(string $value): self
    {
        $this->includes[] = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('excludes')]
    public function getExcludes(): array
    {
        return $this->excludes;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setExcludes(array $values): self
    {
        $this->excludes = [];
        foreach ($values as $value) {
            $this->addExclude($value);
        }

        return $this;
    }

    public function addExclude(string $value): self
    {
        $this->excludes[] = $value;
        return $this;
    }

    public function toArray(): array
    {
        return (new FieldOptionResolver())
            ->buildDataForInstance($this);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
