<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\DynamicTemplate;

use Esindex\Contracts\Arrayable;
use Esindex\Enums\Index\Mappings\RuntimeFieldTypeEnum;

class RuntimeMapping implements Arrayable
{
    public function __construct(
        private readonly RuntimeFieldTypeEnum $type
    ) {
    }

    public function toArray(): array
    {
        return ['type' => $this->type->value];
    }
}
