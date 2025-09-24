<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/index-phrases.html
 */
trait HasIndexPhrases
{
    private ?bool $optIndexPhrases = null;

    #[FieldOption('index_phrases')]
    public function getIndexPhrases(): ?bool
    {
        return $this->optIndexPhrases;
    }

    public function setIndexPhrases(?bool $value): self
    {
        $this->optIndexPhrases = $value;
        return $this;
    }
}
