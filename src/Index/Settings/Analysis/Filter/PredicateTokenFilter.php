<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Behavior\Index\HasScript;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-predicatefilter-tokenfilter.html
 */
class PredicateTokenFilter extends AbstractFilter
{
    use HasScript;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::PREDICATE_TOKEN_FILTER;
    }
}
