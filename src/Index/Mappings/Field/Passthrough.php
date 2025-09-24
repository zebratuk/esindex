<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Mappings\HasDynamic;
use Esindex\Behavior\Index\Mappings\HasEnabled;
use Esindex\Behavior\Index\Mappings\HasProperties;
use Esindex\Behavior\Index\Mappings\HasTimeSeriesDimension;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

class Passthrough extends AbstractField
{
    use HasTimeSeriesDimension,
        HasDynamic,
        HasEnabled,
        HasProperties;

    public function __construct(
        string $name,
        readonly private int $priority
    ) {
        parent::__construct($name);
    }

    #[FieldOption('priority')]
    public function getPriority(): int
    {
        return $this->priority;
    }

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::PASSTHROUGH;
    }
}
