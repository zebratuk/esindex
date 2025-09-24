<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Behavior\Index\Mappings\HasAnalyzer;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/token-count.html
 */
class TokenCount extends AbstractField
{
    use HasAnalyzer,
        HasDocValues,
        HasIndex,
        HasNullValue,
        HasStore;

    private ?bool $enablePositionIncrements = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::TOKEN_COUNT;
    }

    #[BooleanFieldOption('enable_position_increments')]
    public function getEnablePositionIncrements(): ?bool
    {
        return $this->enablePositionIncrements;
    }

    public function setEnablePositionIncrements(?bool $value): self
    {
        $this->enablePositionIncrements = $value;
        return $this;
    }
}
