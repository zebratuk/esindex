<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasCharFilter;
use Esindex\Behavior\Index\Settings\Analysis\HasFilter;
use Esindex\Enums\Index\Analysis\AnalyzerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-custom-analyzer.html
 */
class Custom extends AbstractAnalyzer
{
    use HasCharFilter,
        HasFilter;

    public function __construct(
        string $name,
        readonly public string $tokenizer,
        private ?int $positionIncrementGap = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('tokenizer')]
    public function getTokenizer(): string
    {
        return $this->tokenizer;
    }

    #[FieldOption('position_increment_gap')]
    public function getPositionIncrementGap(): ?int
    {
        return $this->positionIncrementGap;
    }

    public function setPositionIncrementGap(?int $value): self
    {
        $this->positionIncrementGap = $value;
        return $this;
    }

    public function getType(): AnalyzerTypeEnum
    {
        return AnalyzerTypeEnum::CUSTOM;
    }
}
