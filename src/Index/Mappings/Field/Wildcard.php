<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasIgnoreAbove;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/keyword.html
 */
class Wildcard extends AbstractField
{
    use HasNullValue,
        HasIgnoreAbove;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::WILDCARD;
    }
}
