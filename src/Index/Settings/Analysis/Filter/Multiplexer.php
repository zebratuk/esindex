<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-multiplexer-tokenfilter.html
 */
class Multiplexer extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $filters = [];
    private ?bool $preserveOriginal = null;

    /**
     * @param string $name
     * @param string[] $filters
     */
    public function __construct(
        string $name,
        array $filters
    ) {
        parent::__construct($name);

        $this->setFilters($filters);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::MULTIPLEXER;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('filters')]
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setFilters(array $values): self
    {
        $this->filters = [];
        foreach ($values as $value) {
            $this->addFilter($value);
        }

        return $this;
    }

    public function addFilter(string $value): self
    {
        $this->filters[] = $value;
        return $this;
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
}
