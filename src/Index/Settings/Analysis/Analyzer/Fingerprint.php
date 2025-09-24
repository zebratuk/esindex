<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasStopWords;
use Esindex\Enums\Index\Analysis\AnalyzerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-fingerprint-analyzer.html
 */
class Fingerprint extends AbstractAnalyzer
{
    use HasStopWords;

    public function __construct(
        string $name,
        private ?string $separator = null,
        private ?int $maxOutputSize = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('separator')]
    public function getSeparator(): ?string
    {
        return $this->separator;
    }

    public function setSeparator(?string $value): self
    {
        $this->separator = $value;
        return $this;
    }

    #[FieldOption('max_output_size')]
    public function getMaxOutputSize(): ?int
    {
        return $this->maxOutputSize;
    }

    public function setMaxOutputSize(?int $value): self
    {
        $this->maxOutputSize = $value;
        return $this;
    }

    public function getType(): AnalyzerTypeEnum
    {
        return AnalyzerTypeEnum::FINGERPRINT;
    }
}
