<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\CharFilter;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Settings\Analysis\CharFilterInterface;

abstract class AbstractCharFilter implements CharFilterInterface, \JsonSerializable
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
     * Build char_filter settings
     *
     * @return array
     */
    protected function buildData(): array
    {
        return [];
    }
}
