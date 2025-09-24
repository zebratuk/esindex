<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum TimeSeriesMetricEnum: string
{
    case COUNTER = 'counter';
    case GAUGE = 'gauge';
}
