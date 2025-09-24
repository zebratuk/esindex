<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasStopWords;
use Esindex\Enums\Index\Analysis\AnalyzerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pattern-analyzer.html
 */
class Pattern extends AbstractAnalyzer
{
    use HasStopWords;

    public function __construct(
        string $name,
        private ?string $pattern = null,
        private ?string $flags = null,
        private ?bool $lowercase = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('pattern')]
    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setPattern(?string $value): self
    {
        $this->pattern = $value;
        return $this;
    }

    #[FieldOption('flags')]
    public function getFlags(): ?string
    {
        return $this->flags;
    }

    public function setFlags(?string $value): self
    {
        $this->flags = $value;
        return $this;
    }

    #[BooleanFieldOption('lowercase')]
    public function getLowercase(): ?bool
    {
        return $this->lowercase;
    }

    public function setLowercase(?bool $value): self
    {
        $this->lowercase = $value;
        return $this;
    }

    public function getType(): AnalyzerTypeEnum
    {
        return AnalyzerTypeEnum::PATTERN;
    }
}
