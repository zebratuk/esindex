<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum AggregateMetricDoubleEnum: string
{
    case MIN = 'min';
    case MAX = 'max';
    case SUM = 'sum';
    case VALUE_COUNT = 'value_count';
}
