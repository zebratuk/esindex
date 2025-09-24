<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Index\Mappings\Unit\MetaUnit;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/mapping-field-meta.html
 */
trait HasMeta
{
    private ?MetaUnit $optMeta = null;

    #[ArrayableFieldOption('meta')]
    public function getMeta(): ?MetaUnit
    {
        return $this->optMeta;
    }

    public function setMeta(?MetaUnit $value): self
    {
        $this->optMeta = $value;
        return $this;
    }
}
