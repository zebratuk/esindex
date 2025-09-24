<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Enums\Index\Analysis\Filter\EncodingEnum;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-delimited-payload-tokenfilter.html
 */
class DelimitedPayload extends AbstractFilter
{
    private ?string $delimiter = null;
    private ?EncodingEnum $encoding = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::DELIMITED_PAYLOAD;
    }

    public function getDelimiter(): ?string
    {
        return $this->delimiter;
    }

    public function setDelimiter(?string $value): self
    {
        $this->delimiter = $value;
        return $this;
    }

    public function getEncoding(): ?EncodingEnum
    {
        return $this->encoding;
    }

    public function setEncoding(?EncodingEnum $value): self
    {
        $this->encoding = $value;
        return $this;
    }

    protected function buildData(): array
    {
        return [
            'delimiter' => $this->delimiter,
            'encoding' => $this->encoding?->value,
        ];
    }
}
