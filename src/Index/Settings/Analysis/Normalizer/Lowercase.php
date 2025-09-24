<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Normalizer;

use Esindex\Enums\Index\Analysis\NormalizerTypeEnum;

class Lowercase extends AbstractNormalizer
{
    public function getType(): NormalizerTypeEnum
    {
        return NormalizerTypeEnum::LOWERCASE;
    }
}
