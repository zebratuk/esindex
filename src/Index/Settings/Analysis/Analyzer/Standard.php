<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasStopWords;
use Esindex\Enums\Index\Analysis\AnalyzerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-standard-analyzer.html
 */
class Standard extends AbstractAnalyzer
{
    use HasStopWords;

    public function __construct(
        string $name,
        private ?int $maxTokenLength = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('max_token_length')]
    public function getMaxTokenLength(): ?int
    {
        return $this->maxTokenLength;
    }

    public function setMaxTokenLength(?int $value): self
    {
        $this->maxTokenLength = $value;
        return $this;
    }

    public function getType(): AnalyzerTypeEnum
    {
        return AnalyzerTypeEnum::STANDARD;
    }
}
