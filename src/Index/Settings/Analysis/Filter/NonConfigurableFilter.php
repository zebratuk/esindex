<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Enums\Index\Analysis\FilterTypeEnum;

class NonConfigurableFilter extends AbstractFilter
{
    public function __construct(
        string $name,
        readonly public FilterTypeEnum $type
    ) {
        parent::__construct($name);
    }

    public function getType(): FilterTypeEnum
    {
        return $this->type;
    }
}
