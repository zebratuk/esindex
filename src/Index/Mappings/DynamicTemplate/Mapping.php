<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\DynamicTemplate;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Behavior\Index\Mappings\HasAnalyzer;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasFields;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasNorms;
use Esindex\Contracts\Arrayable;

class Mapping implements Arrayable
{
    use HasFields,
        HasNorms,
        HasIndex,
        HasDocValues,
        HasAnalyzer;

    public function __construct(
        readonly private string $type
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        $result = (new FieldOptionResolver())
            ->buildDataForInstance($this);

        $result['type'] = $this->type;

        return $result;
    }
}
