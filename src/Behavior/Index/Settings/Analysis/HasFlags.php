<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pattern-tokenizer.html
 */
trait HasFlags
{
    private ?string $optFlags = null;

    #[FieldOption('flags')]
    public function getFlags(): ?string
    {
        return $this->optFlags;
    }

    public function setFlags(?string $value): self
    {
        $this->optFlags = $value;
        return $this;
    }
}
