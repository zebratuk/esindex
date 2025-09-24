<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasDynamic;
use Esindex\Behavior\Index\Mappings\HasEnabled;
use Esindex\Behavior\Index\Mappings\HasProperties;
use Esindex\Behavior\Index\Mappings\HasSubobjects;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

class ObjectField extends AbstractField
{
    use HasDynamic,
        HasEnabled,
        HasProperties,
        HasSubobjects;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::OBJECT;
    }
}
