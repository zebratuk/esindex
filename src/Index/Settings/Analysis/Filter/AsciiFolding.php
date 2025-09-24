<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-asciifolding-tokenfilter.html
 */
class AsciiFolding extends AbstractFilter
{
    public function __construct(
        string $name,
        private ?bool $preserveOriginal = null
    ) {
        parent::__construct($name);
    }

    #[BooleanFieldOption('preserve_original')]
    public function getPreserveOriginal(): ?bool
    {
        return $this->preserveOriginal;
    }

    public function setPreserveOriginal(?bool $value): self
    {
        $this->preserveOriginal = $value;
        return $this;
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::ASCIIFOLDING;
    }
}
