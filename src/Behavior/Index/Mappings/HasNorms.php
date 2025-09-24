<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/norms.html
 */
trait HasNorms
{
    private ?bool $optNorms = null;

    #[FieldOption('norms')]
    public function getNorms(): ?bool
    {
        return $this->optNorms;
    }

    public function setNorms(?bool $value): self
    {
        $this->optNorms = $value;
        return $this;
    }
}
