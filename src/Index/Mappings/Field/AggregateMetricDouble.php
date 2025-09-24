<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Behavior\Index\Mappings\HasTimeSeriesDimension;
use Esindex\Enums\Index\Mappings\AggregateMetricDoubleEnum;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Enums\Index\SectionEnum;
use Esindex\Exceptions\InvalidConfigurationException;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/aggregate-metric-double.html
 */
class AggregateMetricDouble extends AbstractField
{
    use HasTimeSeriesDimension;

    /**
     * @var AggregateMetricDoubleEnum[]
     */
    private array $metrics = [];

    public function __construct(
        string $name,
        readonly private AggregateMetricDoubleEnum $defaultMetric,
        array $metrics = []
    ) {
        parent::__construct($name);

        $this->setMetrics($metrics);
    }

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::AGGREGATE_METRIC_DOUBLE;
    }

    #[EnumFieldOption('default_metric')]
    public function getDefaultMetric(): AggregateMetricDoubleEnum
    {
        return $this->defaultMetric;
    }

    /**
     * @return AggregateMetricDoubleEnum[]
     */
    public function getMetrics(): array
    {
        return $this->metrics;
    }

    /**
     * @param AggregateMetricDoubleEnum[] $values
     * @return $this
     */
    public function setMetrics(array $values): self
    {
        $this->metrics = [];
        foreach ($values as $value) {
            $this->addMetric($value);
        }

        return $this;
    }

    public function addMetric(AggregateMetricDoubleEnum $value): self
    {
        $this->metrics[] = $value;
        return $this;
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        $metrics = array_map(
            fn($v) => $v->value,
            $this->metrics
        );
        if (empty($metrics)) {
            throw new InvalidConfigurationException(
                section: SectionEnum::MAPPINGS_PROPERTIES,
                field: $this->getName(),
                message: 'Invalid metrics'
            );
        }

        return [
            'metrics' => $metrics,
        ];
    }
}
