<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

trait HasCharFilter
{
    private array $optCharFilter = [];

    #[FieldOption('char_filter')]
    public function getCharFilter(): array
    {
        return $this->optCharFilter;
    }

    public function setCharFilter(array $filters): self
    {
        $this->optCharFilter = [];
        foreach ($filters as $filter) {
            $this->addCharFilter($filter);
        }

        return $this;
    }

    public function addCharFilter(string $value): self
    {
        $this->optCharFilter[] = $value;
        return $this;
    }
}
