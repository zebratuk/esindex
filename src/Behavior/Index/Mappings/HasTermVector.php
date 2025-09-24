<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Mappings\TermVectorEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/term-vector.html
 */
trait HasTermVector
{
    private ?TermVectorEnum $optTermVector = null;

    #[EnumFieldOption('term_vector')]
    public function getTermVector(): ?TermVectorEnum
    {
        return $this->optTermVector;
    }

    public function setTermVector(?TermVectorEnum $value): self
    {
        $this->optTermVector = $value;
        return $this;
    }
}
