<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

trait HasFilter
{
    private array $optFilter = [];

    #[FieldOption('filter')]
    public function getFilter(): array
    {
        return $this->optFilter;
    }

    public function setFilter(array $filters): self
    {
        $this->optFilter = [];
        foreach ($filters as $filter) {
            $this->addFilter($filter);
        }

        return $this;
    }

    public function addFilter(string $value): self
    {
        $this->optFilter[] = $value;
        return $this;
    }
}
