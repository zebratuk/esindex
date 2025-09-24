<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Settings\Analysis;

use Esindex\Contracts\JsonStructInterface;
use Esindex\Enums\Index\Analysis\CharFilterTypeEnum;

interface CharFilterInterface extends JsonStructInterface
{
    public function getType(): CharFilterTypeEnum;
}
