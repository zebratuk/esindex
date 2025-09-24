<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Mappings\SimilarityEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/similarity.html
 */
trait HasSimilarity
{
    private ?SimilarityEnum $optSimilarity = null;

    #[EnumFieldOption('similarity')]
    public function getSimilarity(): ?SimilarityEnum
    {
        return $this->optSimilarity;
    }

    public function setSimilarity(?SimilarityEnum $value): self
    {
        $this->optSimilarity = $value;
        return $this;
    }
}
