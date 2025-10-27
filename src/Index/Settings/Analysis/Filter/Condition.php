<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Enums\Index\Analysis\FilterTypeEnum;
use Esindex\Enums\Index\SectionEnum;
use Esindex\Exceptions\InvalidConfigurationException;
use Esindex\Index\Unit\ScriptUnit;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-condition-tokenfilter.html
 */
class Condition extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $filter = [];
    private ?ScriptUnit $script = null;

    /**
     * @return string[]
     */
    public function getFilter(): array
    {
        return $this->filter;
    }

    /**
     * @param string[]|FilterTypeEnum[] $filters
     * @return $this
     */
    public function setFilter(array $filters): self
    {
        $this->filter = [];
        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }

        return $this;
    }

    public function addFilter(string|FilterTypeEnum $value): self
    {
        $this->filter[] = is_string($value) ? $value : $value->value;
        return $this;
    }

    public function getScript(): ?ScriptUnit
    {
        return $this->script;
    }

    public function setScript(?ScriptUnit $value): self
    {
        $this->script = $value;
        return $this;
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::CONDITION;
    }

    /**
     * @return array
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        if (empty($this->filter) || empty($this->script)) {
            throw new InvalidConfigurationException(
                section: SectionEnum::SETTINGS_ANALYSIS_FILTER,
                field: $this->getName(),
                message: "Invalid filter or script"
            );
        }

        return [
            'filter' => $this->filter,
            'script' => $this->script->toArray(),
        ];
    }
}
