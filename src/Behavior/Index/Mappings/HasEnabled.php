<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\BooleanFieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/enabled.html
 */
trait HasEnabled
{
    private ?bool $optEnabled = null;

    #[BooleanFieldOption('enabled')]
    public function getEnabled(): ?bool
    {
        return $this->optEnabled;
    }

    public function setEnabled(?bool $value): self
    {
        $this->optEnabled = $value;
        return $this;
    }
}
