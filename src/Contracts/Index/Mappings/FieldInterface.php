<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Mappings;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Contracts\JsonStructInterface;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;

interface FieldInterface extends JsonStructInterface
{
    /**
     * @return FieldTypeEnum
     */
    #[EnumFieldOption('type')]
    public function getType(): FieldTypeEnum;
}
