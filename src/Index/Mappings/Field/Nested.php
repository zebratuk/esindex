<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Behavior\Index\Mappings\HasDynamic;
use Esindex\Behavior\Index\Mappings\HasProperties;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/nested.html
 */
class Nested extends AbstractField
{
    use HasDynamic,
        HasProperties;

    private ?bool $includeInParent = null;
    private ?bool $includeInRoot = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::NESTED;
    }

    #[BooleanFieldOption('include_in_parent')]
    public function getIncludeInParent(): ?bool
    {
        return $this->includeInParent;
    }

    public function setIncludeInParent(?bool $value): self
    {
        $this->includeInParent = $value;
        return $this;
    }

    #[BooleanFieldOption('include_in_root')]
    public function getIncludeInRoot(): ?bool
    {
        return $this->includeInRoot;
    }

    public function setIncludeInRoot(?bool $value): self
    {
        $this->includeInRoot = $value;
        return $this;
    }
}
