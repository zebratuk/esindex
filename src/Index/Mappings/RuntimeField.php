<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Behavior\Index\Mappings\HasScript;
use Esindex\Contracts\Index\Mappings\RuntimeFieldInterface;
use Esindex\Enums\Index\Mappings\RuntimeFieldTypeEnum;

class RuntimeField implements RuntimeFieldInterface
{
    use HasScript;

    /**
     * @param string $name
     * @param RuntimeFieldTypeEnum $type
     */
    public function __construct(
        private readonly string $name,
        private readonly RuntimeFieldTypeEnum $type
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): RuntimeFieldTypeEnum
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    final public function toArray(): array
    {
        $result = (new FieldOptionResolver())
            ->buildDataForInstance($this);

        $result['type'] = $this->getType()->value;

        return $result;
    }
}
