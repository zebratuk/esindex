<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\CharFilter;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasFlags;
use Esindex\Behavior\Index\Settings\Analysis\HasPattern;
use Esindex\Enums\Index\Analysis\CharFilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pattern-replace-charfilter.html
 */
class PatternReplace extends AbstractCharFilter
{
    use HasPattern,
        HasFlags;

    public function __construct(
        string $name,
        private string $replacement
    ) {
        parent::__construct($name);
    }

    #[FieldOption('replacement')]
    public function getReplacement(): string
    {
        return $this->replacement;
    }

    public function setReplacement(string $value): self
    {
        $this->replacement = $value;
        return $this;
    }

    public function getType(): CharFilterTypeEnum
    {
        return CharFilterTypeEnum::PATTERN_REPLACE;
    }
}
