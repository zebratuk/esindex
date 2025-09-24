<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Normalizer;

use Esindex\Behavior\Index\Settings\Analysis\HasCharFilter;
use Esindex\Behavior\Index\Settings\Analysis\HasFilter;
use Esindex\Enums\Index\Analysis\NormalizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-normalizers.html
 */
class Custom extends AbstractNormalizer
{
    use HasCharFilter,
        HasFilter;

    public function getType(): NormalizerTypeEnum
    {
        return NormalizerTypeEnum::CUSTOM;
    }
}
