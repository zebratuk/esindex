<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Behavior\Index\Settings\Analysis\HasSynonym;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-synonym-tokenfilter.html
 */
class Synonym extends AbstractFilter
{
    use HasSynonym;

    private ?bool $updateable = null;
    private ?bool $expand = null;
    private ?bool $lenient = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::SYNONYM;
    }

    public function getUpdateable(): ?bool
    {
        return $this->updateable;
    }

    public function setUpdateable(?bool $value): self
    {
        $this->updateable = $value;
        return $this;
    }

    public function getExpand(): ?bool
    {
        return $this->expand;
    }

    public function setExpand(?bool $value): self
    {
        $this->expand = $value;
        return $this;
    }

    public function getLenient(): ?bool
    {
        return $this->lenient;
    }

    public function setLenient(?bool $value): self
    {
        $this->lenient = $value;
        return $this;
    }

    protected function buildData(): array
    {
        return [
            'updateable' => $this->updateable,
            'expand' => $this->expand,
            'lenient' => $this->lenient,
        ];
    }
}
