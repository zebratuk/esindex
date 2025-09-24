<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Mappings\DynamicEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/dynamic.html
 */
trait HasDynamic
{
    private DynamicEnum|bool|null $optDynamic = null;

    #[EnumFieldOption('dynamic')]
    public function getDynamic(): DynamicEnum|bool|null
    {
        return $this->optDynamic;
    }

    public function setDynamic(DynamicEnum|bool|null $value): self
    {
        $this->optDynamic = $value;
        return $this;
    }
}
