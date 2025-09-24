<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Mappings\TimeSeriesMetricEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/tsds.html#time-series-dimension
 */
trait HasTimeSeriesDimension
{
    private ?bool $optTimeSeriesDimension = null;
    private ?TimeSeriesMetricEnum $optTimeSeriesMetric = null;

    #[BooleanFieldOption('time_series_dimension')]
    public function getTimeSeriesDimension(): ?bool
    {
        return $this->optTimeSeriesDimension;
    }

    public function setTimeSeriesDimension(?bool $value): self
    {
        $this->optTimeSeriesDimension = $value;
        return $this;
    }

    #[EnumFieldOption('time_series_metric')]
    public function getTimeSeriesMetric(): ?TimeSeriesMetricEnum
    {
        return $this->optTimeSeriesMetric;
    }

    public function setTimeSeriesMetric(?TimeSeriesMetricEnum $value): self
    {
        $this->optTimeSeriesMetric = $value;
        return $this;
    }
}
