<?php
declare(strict_types=1);

namespace Esindex\Behavior\Request;

use Esindex\Attribute\ArrayEnumOption;
use Esindex\Enums\Request\Index\ExpandWildcardsEnum;

trait HasExpandWildcards
{
    /**
     * @var ExpandWildcardsEnum[]|null
     */
    private ?array $optExpandWildcards = null;

    /**
     * @return ExpandWildcardsEnum[]|null
     */
    #[ArrayEnumOption('expand_wildcards')]
    public function getExpandWildcards(): ?array
    {
        return $this->optExpandWildcards;
    }

    /**
     * @param ExpandWildcardsEnum[]|null $values
     * @return HasExpandWildcards
     */
    public function setExpandWildcards(?array $values): self
    {
        if (is_array($values)) {
            $this->optExpandWildcards = [];
            foreach ($values as $value) {
                $this->addExpandWildcard($value);
            }
        } else {
            $this->optExpandWildcards = null;
        }

        return $this;
    }

    public function addExpandWildcard(ExpandWildcardsEnum $value): self
    {
        $this->optExpandWildcards ??= [];
        $this->optExpandWildcards[] = $value;

        return $this;
    }
}
