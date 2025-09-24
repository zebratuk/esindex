<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Settings\Analysis;

use Esindex\Contracts\JsonStructInterface;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

interface TokenizerInterface extends JsonStructInterface
{
    public function getType(): TokenizerTypeEnum;
}
