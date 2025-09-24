<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Enums\Index\Mappings\FieldTypeEnum;

class DateNanos extends Date
{
    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::DATE_NANOS;
    }
}
