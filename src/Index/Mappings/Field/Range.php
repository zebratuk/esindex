<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasCoerce;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasFormat;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Exceptions\AssertException;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/range.html
 */
class Range extends AbstractField
{
    use HasCoerce,
        HasDocValues,
        HasIndex,
        HasStore,
        HasFormat;

    private const ALLOWED_TYPES = [
        FieldTypeEnum::INTEGER_RANGE, FieldTypeEnum::FLOAT_RANGE, FieldTypeEnum::LONG_RANGE,
        FieldTypeEnum::DOUBLE_RANGE, FieldTypeEnum::DATE_RANGE, FieldTypeEnum::IP_RANGE,
    ];

    public function __construct(
        string $name,
        readonly private FieldTypeEnum $rangeType
    ) {
        parent::__construct($name);

        $this->assertType($this->rangeType);
    }

    public function getType(): FieldTypeEnum
    {
        return $this->rangeType;
    }

    /**
     * @param FieldTypeEnum $type
     * @return void
     * @throws AssertException
     */
    private function assertType(FieldTypeEnum $type): void
    {
        if (!in_array($type, self::ALLOWED_TYPES, true)) {
            throw new AssertException(
                sprintf('Invalid range field type: %s declared as %s',
                    $this->getName(),
                    $type->value
                )
            );
        }
    }
}
