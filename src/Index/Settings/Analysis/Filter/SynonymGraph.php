<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasSynonym;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-synonym-graph-tokenfilter.html
 */
class SynonymGraph extends AbstractFilter
{
    use HasSynonym;

    private ?bool $updateable = null;
    private ?bool $expand = null;
    private ?bool $lenient = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::SYNONYM_GRAPH;
    }

    #[BooleanFieldOption('updateable')]
    public function getUpdateable(): ?bool
    {
        return $this->updateable;
    }

    public function setUpdateable(?bool $value): self
    {
        $this->updateable = $value;
        return $this;
    }

    #[BooleanFieldOption('expand')]
    public function getExpand(): ?bool
    {
        return $this->expand;
    }

    public function setExpand(?bool $value): self
    {
        $this->expand = $value;
        return $this;
    }

    #[BooleanFieldOption('lenient')]
    public function getLenient(): ?bool
    {
        return $this->lenient;
    }

    public function setLenient(?bool $value): self
    {
        $this->lenient = $value;
        return $this;
    }
}
