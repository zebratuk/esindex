<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/mapping-date-format.html
 */
trait HasFormat
{
    private array $optFormat = [];

    #[FieldOption('format')]
    public function getFormat(): ?string
    {
        return empty($this->optFormat) ? null : implode('||', $this->optFormat);
    }

    public function setFormat(array $values): self
    {
        $this->optFormat = [];
        foreach ($values as $value) {
            $this->addFormat($value);
        }

        return $this;
    }

    public function addFormat(string $value): self
    {
        $this->optFormat[] = $value;
        return $this;
    }
}
