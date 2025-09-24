<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Unit;

use Esindex\Contracts\Arrayable;

/**
 * https://www.elastic.co/guide/en/elasticsearch/reference/8.18/mapping-field-meta.html
 */
class MetaUnit implements Arrayable, \JsonSerializable
{
    /**
     * At most 5 entries
     *
     * @var array<string, string>
     */
    private array $data = [];

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Field metadata enforces at most 5 entries, that keys have a length that is less than or equal to 20,
     * and that values are strings whose length is less than or equal to 50.
     *
     * @param string $key Key length <= 20
     * @param string $value Value length <= 50
     * @return $this
     */
    public function addField(string $key, string $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function addUnitMeta(string $type): self
    {
        return $this->addField('unit', $type);
    }

    public function addMetricTypeMeta(string $type): self
    {
        return $this->addField('metric_type', $type);
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
