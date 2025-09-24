<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Mappings\IndexOptionsEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/index-options.html
 */
trait HasIndexOptions
{
    private ?IndexOptionsEnum $optIndexOptions = null;

    #[EnumFieldOption('index_options')]
    public function getIndexOptions(): ?IndexOptionsEnum
    {
        return $this->optIndexOptions;
    }

    public function setIndexOptions(?IndexOptionsEnum $value): self
    {
        $this->optIndexOptions = $value;
        return $this;
    }
}
