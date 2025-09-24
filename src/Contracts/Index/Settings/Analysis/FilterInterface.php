<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Settings\Analysis;

use Esindex\Contracts\JsonStructInterface;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

interface FilterInterface extends JsonStructInterface
{
    /**
     * @return FilterTypeEnum
     */
    public function getType(): FilterTypeEnum;
}
