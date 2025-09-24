<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\BooleanFieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/subobjects.html
 */
trait HasSubobjects
{
    private ?bool $optSubobjects = null;

    #[BooleanFieldOption('subobjects')]
    public function getSubobjects(): ?bool
    {
        return $this->optSubobjects;
    }

    public function setSubobjects(?bool $value): self
    {
        $this->optSubobjects = $value;
        return $this;
    }
}
