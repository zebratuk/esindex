<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/ignore-malformed.html
 */
trait HasIgnoreMalformed
{
    private ?bool $optIgnoreMalformed = null;

    #[FieldOption('ignore_malformed')]
    public function getIgnoreMalformed(): ?bool
    {
        return $this->optIgnoreMalformed;
    }

    public function setIgnoreMalformed(?bool $value): self
    {
        $this->optIgnoreMalformed = $value;
        return $this;
    }
}
