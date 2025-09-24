<?php
declare(strict_types=1);

namespace Esindex\DTO\Request\Document;

use Esindex\Contracts\Arrayable;

class DocumentDTO implements Arrayable, \JsonSerializable
{
    public function __construct(
        private array $data = [],
        private ?string $id = null
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $value): self
    {
        $this->id = $value;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $value): self
    {
        $this->data = $value;
        return $this;
    }

    public function toArray(): array
    {
        return $this->getData();
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
