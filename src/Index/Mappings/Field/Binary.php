<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

class Binary extends AbstractField
{
    use HasDocValues,
        HasStore;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::BINARY;
    }
}
