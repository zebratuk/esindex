<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Settings\Analysis\FilterInterface;
use Esindex\Exceptions\InvalidConfigurationException;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-tokenfilters.html
 */
abstract class AbstractFilter implements FilterInterface, \JsonSerializable
{
    public function __construct(
        readonly protected string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigurationException
     */
    public function toArray(): array
    {
        $result = (new FieldOptionResolver())
            ->buildDataForInstance($this);

        $result['type'] = $this->getType()->value;

        $data = \array_filter(
            $this->buildData(),
            static fn($v) => null !== $v
        );

        return \array_merge($result, $data);
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigurationException
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Build filter settings
     *
     * @return array
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        return [];
    }
}
