<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Normalizer;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Settings\Analysis\NormalizerInterface;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-normalizers.html
 */
abstract class AbstractNormalizer implements NormalizerInterface, \JsonSerializable
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

        return array_merge($result, $this->buildData());
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Build normalizer settings
     *
     * @return array
     */
    protected function buildData(): array
    {
        return [];
    }
}
