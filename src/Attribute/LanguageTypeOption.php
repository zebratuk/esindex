<?php
declare(strict_types=1);

namespace Esindex\Attribute;

use \Attribute;
use Esindex\Enums\Common\LanguageTypeEnum;

#[Attribute(Attribute::TARGET_METHOD)]
class LanguageTypeOption extends FieldOption
{
    public function __construct(
        string $optionLiteral,
        readonly public LanguageTypeEnum|array $type,
        mixed $default = null,
        bool $isEmptyResultAvailable = false
    ) {
        parent::__construct($optionLiteral, $default, $isEmptyResultAvailable);
    }

    public function processValue(mixed $value): mixed
    {
        $type = LanguageTypeEnum::getVariableType($value);
        if (!in_array($type, $this->getTypeAsArray(), true)) {
            return null;
        }

        return match($type) {
            LanguageTypeEnum::NULL, LanguageTypeEnum::UNKNOWN => null,
            LanguageTypeEnum::STRING, LanguageTypeEnum::ARRAY => $value ?: null,
            default => $value
        };
    }

    public function getTypeAsArray(): array
    {
        return is_array($this->type) ? $this->type : [$this->type];
    }
}
