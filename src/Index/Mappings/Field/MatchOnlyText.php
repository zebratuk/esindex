<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasFields;
use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/text.html
 */
class MatchOnlyText extends AbstractField
{
    use HasFields,
        HasMeta;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::MATCH_ONLY_TEXT;
    }
}
