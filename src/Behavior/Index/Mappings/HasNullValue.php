<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/null-value.html
 */
trait HasNullValue
{
    private mixed $optNullValue = null;

    #[FieldOption('null_value')]
    public function getNullValue(): mixed
    {
        return $this->optNullValue;
    }

    public function setNullValue(mixed $value): self
    {
        $this->optNullValue = $value;
        return $this;
    }
}
