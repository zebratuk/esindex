<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-stemmer-tokenfilter.html
 */
class Stemmer extends AbstractFilter
{
    private ?string $language = null;
    /**
     * @var string|null Option <name>
     */
    private ?string $langName = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::STEMMER;
    }

    #[FieldOption('language')]
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $value): self
    {
        $this->language = $value;
        return $this;
    }

    #[FieldOption('name')]
    public function getLangName(): ?string
    {
        return $this->langName;
    }

    public function setLangName(?string $value): self
    {
        $this->langName = $value;
        return $this;
    }
}
