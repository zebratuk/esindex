<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Mappings;

use Esindex\Contracts\JsonStructInterface;
use Esindex\Enums\Index\Mappings\RuntimeFieldTypeEnum;

interface RuntimeFieldInterface extends JsonStructInterface
{
    /**
     * @return RuntimeFieldTypeEnum
     */
    public function getType(): RuntimeFieldTypeEnum;
}
