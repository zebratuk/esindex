<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\HasScript;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasIgnoreMalformed;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Behavior\Index\Mappings\HasOnScriptError;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Behavior\Index\Mappings\HasTimeSeriesDimension;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/boolean.html
 */
class Boolean extends AbstractField
{
    use HasDocValues,
        HasIndex,
        HasIgnoreMalformed,
        HasNullValue,
        HasStore,
        HasMeta,
        HasScript,
        HasOnScriptError,
        HasTimeSeriesDimension;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::BOOLEAN;
    }
}
