<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\BooleanFieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/coerce.html
 */
trait HasCoerce
{
    private ?bool $optCoerce = null;

    #[BooleanFieldOption('coerce')]
    public function getCoerce(): ?bool
    {
        return $this->optCoerce;
    }

    public function setCoerce(?bool $value): self
    {
        $this->optCoerce = $value;
        return $this;
    }
}
