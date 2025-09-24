<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Settings\Analysis\AnalyzerInterface;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/configuring-analyzers.html
 */
abstract class AbstractAnalyzer implements AnalyzerInterface, \JsonSerializable
{
    public function __construct(
        readonly protected string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        $result = (new FieldOptionResolver())
            ->buildDataForInstance($this);

        $result['type'] = $this->getType()->value;

        $data = array_filter(
            $this->buildData(),
            static fn($v) => null !== $v
        );

        return array_merge($result, $data);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Build analyzer settings
     *
     * @return array
     */
    protected function buildData(): array
    {
        return [];
    }
}
