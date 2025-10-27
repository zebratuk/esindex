<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\HasScript;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasEagerGlobalOrdinals;
use Esindex\Behavior\Index\Mappings\HasFields;
use Esindex\Behavior\Index\Mappings\HasIgnoreAbove;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasIndexOptions;
use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Behavior\Index\Mappings\HasNormalizer;
use Esindex\Behavior\Index\Mappings\HasNorms;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Behavior\Index\Mappings\HasOnScriptError;
use Esindex\Behavior\Index\Mappings\HasSimilarity;
use Esindex\Behavior\Index\Mappings\HasSplitQueriesOnWhitespace;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Behavior\Index\Mappings\HasTimeSeriesDimension;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/keyword.html
 */
class Keyword extends AbstractField
{
    use HasDocValues,
        HasEagerGlobalOrdinals,
        HasFields,
        HasIgnoreAbove,
        HasIndex,
        HasIndexOptions,
        HasMeta,
        HasNorms,
        HasNullValue,
        HasScript,
        HasOnScriptError,
        HasStore,
        HasSimilarity,
        HasNormalizer,
        HasSplitQueriesOnWhitespace,
        HasTimeSeriesDimension;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::KEYWORD;
    }
}
