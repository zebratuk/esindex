<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasFormat;
use Esindex\Behavior\Index\Mappings\HasIgnoreMalformed;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Behavior\Index\Mappings\HasScript;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

class Date extends AbstractField
{
    use HasDocValues,
        HasFormat,
        HasIgnoreMalformed,
        HasIndex,
        HasNullValue,
        HasScript,
        HasStore,
        HasMeta;

    private ?string $locale = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::DATE;
    }

    #[FieldOption('locale')]
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $value): self
    {
        $this->locale = $value;
        return $this;
    }


}
