<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/normalizer.html
 */
trait HasNormalizer
{
    private ?string $optNormalizer = null;

    #[FieldOption('normalizer')]
    public function getNormalizer(): ?string
    {
        return $this->optNormalizer;
    }

    public function setNormalizer(?string $value): self
    {
        $this->optNormalizer = $value;
        return $this;
    }
}
