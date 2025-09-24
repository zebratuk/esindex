<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Unit;

use Esindex\Contracts\Arrayable;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/index-prefixes.html
 */
class IndexPrefixesUnit implements Arrayable, \JsonSerializable
{
    public function __construct(
        private ?int $minChars = null,
        private ?int $maxChars = null
    ) {
    }

    public function getMinChars(): ?int
    {
        return $this->minChars;
    }

    public function setMinChars(?int $value): self
    {
        $this->minChars = $value;
        return $this;
    }

    public function getMaxChars(): ?int
    {
        return $this->maxChars;
    }

    public function setMaxChars(?int $value): self
    {
        $this->maxChars = $value;
        return $this;
    }

    public function toArray(): array
    {
        $result = [];

        if (null !== $this->minChars) {
            $result['min_chars'] = $this->minChars;
        }

        if (null !== $this->maxChars) {
            $result['max_chars'] = $this->maxChars;
        }

        return $result;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
