<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\HasScript;
use Esindex\Behavior\Index\Mappings\HasCoerce;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasIgnoreMalformed;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Behavior\Index\Mappings\HasOnScriptError;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Behavior\Index\Mappings\HasTimeSeriesDimension;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Exceptions\AssertException;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/number.html
 */
class Number extends AbstractField
{
    use HasCoerce,
        HasDocValues,
        HasIgnoreMalformed,
        HasIndex,
        HasMeta,
        HasNullValue,
        HasScript,
        HasOnScriptError,
        HasStore,
        HasTimeSeriesDimension;

    private const ALLOWED_TYPES = [
        FieldTypeEnum::LONG, FieldTypeEnum::INTEGER, FieldTypeEnum::SHORT, FieldTypeEnum::BYTE,
        FieldTypeEnum::DOUBLE, FieldTypeEnum::FLOAT, FieldTypeEnum::HALF_FLOAT, FieldTypeEnum::SCALED_FLOAT,
        FieldTypeEnum::UNSIGNED_LONG,
    ];

    private ?float $scalingFactor = null;

    /**
     * @inheritdoc
     * @param FieldTypeEnum $numberType
     * @throws AssertException
     */
    public function __construct(
        string $name,
        readonly private FieldTypeEnum $numberType
    ) {
        parent::__construct($name);

        $this->assertType($this->numberType);
    }

    public function getType(): FieldTypeEnum
    {
        return $this->numberType;
    }

    /**
     * @return ?float
     */
    #[FieldOption('scaling_factor')]
    public function getScalingFactor(): ?float
    {
        return $this->scalingFactor;
    }

    /**
     * @param ?float $value
     * @return $this
     */
    public function setScalingFactor(?float $value): self
    {
        if ($this->getType() === FieldTypeEnum::SCALED_FLOAT) {
            $this->scalingFactor = $value;
        }

        return $this;
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
                sprintf('Invalid number field type: %s declared as %s',
                    $this->getName(),
                    $type->value
                )
            );
        }
    }
}
