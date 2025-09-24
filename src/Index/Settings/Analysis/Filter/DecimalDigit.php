<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-decimal-digit-tokenfilter.html
 */
class DecimalDigit extends AbstractFilter
{
    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::DECIMAL_DIGIT;
    }
}
