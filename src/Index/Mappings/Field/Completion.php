<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Mappings\HasAnalyzer;
use Esindex\Behavior\Index\Mappings\HasSearchAnalyzer;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/search-suggesters.html#completion-suggester
 */
class Completion extends AbstractField
{
    use HasAnalyzer,
        HasSearchAnalyzer;

    private ?bool $preserveSeparators = null;
    private ?bool $preservePositionIncrements = null;
    private ?int $maxInputLength = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::COMPLETION;
    }

    #[BooleanFieldOption('preserve_separators')]
    public function getPreserveSeparators(): ?bool
    {
        return $this->preserveSeparators;
    }

    public function setPreserveSeparators(?bool $value): self
    {
        $this->preserveSeparators = $value;
        return $this;
    }

    #[BooleanFieldOption('preserve_position_increments')]
    public function getPreservePositionIncrements(): ?bool
    {
        return $this->preservePositionIncrements;
    }

    public function setPreservePositionIncrements(?bool $value): self
    {
        $this->preservePositionIncrements = $value;
        return $this;
    }

    #[FieldOption('max_input_length')]
    public function getMaxInputLength(): ?int
    {
        return $this->maxInputLength;
    }

    public function setMaxInputLength(?int $value): self
    {
        $this->maxInputLength = $value;
        return $this;
    }
}
