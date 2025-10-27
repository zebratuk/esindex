<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-fingerprint-tokenfilter.html
 */
class Fingerprint extends AbstractFilter
{
    private ?int $maxOutputSize = null;
    private ?string $separator = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::FINGERPRINT;
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
}
