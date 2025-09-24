<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/ignore-above.html
 */
trait HasIgnoreAbove
{
    private ?int $optIgnoreAbove = null;

    #[FieldOption('ignore_above')]
    public function getIgnoreAbove(): ?int
    {
        return $this->optIgnoreAbove;
    }

    public function setIgnoreAbove(?int $value): self
    {
        $this->optIgnoreAbove = $value;
        return $this;
    }
}
