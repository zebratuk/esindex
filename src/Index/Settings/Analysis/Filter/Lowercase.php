<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-lowercase-tokenfilter.html
 */
class Lowercase extends AbstractFilter
{
    private ?string $language = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::LOWERCASE;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $value): self
    {
        $this->language = $value;
        return $this;
    }

    protected function buildData(): array
    {
        return [
            'language' => $this->language,
        ];
    }
}
