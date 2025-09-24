<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Behavior\Index\Mappings\HasEnabled;
use Esindex\Contracts\Index\Mappings\FieldInterface;
use Esindex\Exceptions\InvalidConfigurationException;

abstract class AbstractField implements FieldInterface
{
    use HasEnabled;

    /**
     * @param string $name
     */
    public function __construct(
        private readonly string $name
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
    final public function toArray(): array
    {
        $result = (new FieldOptionResolver())
            ->buildDataForInstance($this);

        $result['type'] = $this->getType()->value;

        return array_merge($result, $this->buildData());
    }

    /**
     * Build field settings
     *
     * @return array
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        return [];
    }
}
