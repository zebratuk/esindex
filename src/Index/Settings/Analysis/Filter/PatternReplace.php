<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pattern_replace-tokenfilter.html
 */
class PatternReplace extends AbstractFilter
{
    private ?string $replacement = null;
    private ?bool $all = null;

    public function __construct(
        string $name,
        readonly private string $pattern
    ) {
        parent::__construct($name);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::PATTERN_REPLACE;
    }

    #[FieldOption('pattern')]
    public function getPattern(): string
    {
        return $this->pattern;
    }

    #[FieldOption('replacement')]
    public function getReplacement(): ?string
    {
        return $this->replacement;
    }

    public function setReplacement(?string $value): self
    {
        $this->replacement = $value;
        return $this;
    }

    #[BooleanFieldOption('all')]
    public function getAll(): ?bool
    {
        return $this->all;
    }

    public function setAll(?bool $value): self
    {
        $this->all = $value;
        return $this;
    }
}
