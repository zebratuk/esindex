<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/keyword.html
 */
class ConstantKeyword extends AbstractField
{
    use HasMeta;

    private mixed $value = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::CONSTANT_KEYWORD;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }

    protected function buildData(): array
    {
        if (empty($this->value)) {
            return [];
        }

        return ['value' => $this->value];
    }
}
