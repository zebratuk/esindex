<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Mappings\HasAnalyzer;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasIndexOptions;
use Esindex\Behavior\Index\Mappings\HasNorms;
use Esindex\Behavior\Index\Mappings\HasSearchAnalyzer;
use Esindex\Behavior\Index\Mappings\HasSimilarity;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Behavior\Index\Mappings\HasTermVector;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/search-as-you-type.html
 */
class SearchAsYouType extends AbstractField
{
    use HasAnalyzer,
        HasIndex,
        HasIndexOptions,
        HasNorms,
        HasStore,
        HasSearchAnalyzer,
        HasSimilarity,
        HasTermVector;

    private ?int $maxShingleSize = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::SEARCH_AS_YOU_TYPE;
    }

    #[FieldOption('max_shingle_size')]
    public function getMaxShingleSize(): ?int
    {
        return $this->maxShingleSize;
    }

    public function setMaxShingleSize(?int $value): self
    {
        $this->maxShingleSize = $value;
        return $this;
    }
}
