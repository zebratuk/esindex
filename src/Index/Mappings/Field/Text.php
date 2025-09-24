<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Behavior\Index\Mappings\HasAnalyzer;
use Esindex\Behavior\Index\Mappings\HasCopyTo;
use Esindex\Behavior\Index\Mappings\HasEagerGlobalOrdinals;
use Esindex\Behavior\Index\Mappings\HasFields;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasIndexOptions;
use Esindex\Behavior\Index\Mappings\HasIndexPhrases;
use Esindex\Behavior\Index\Mappings\HasIndexPrefixes;
use Esindex\Behavior\Index\Mappings\HasMeta;
use Esindex\Behavior\Index\Mappings\HasNorms;
use Esindex\Behavior\Index\Mappings\HasPositionIncrementGap;
use Esindex\Behavior\Index\Mappings\HasSearchAnalyzer;
use Esindex\Behavior\Index\Mappings\HasSimilarity;
use Esindex\Behavior\Index\Mappings\HasStore;
use Esindex\Behavior\Index\Mappings\HasTermVector;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/text.html
 */
class Text extends AbstractField
{
    use HasAnalyzer,
        HasEagerGlobalOrdinals,
        HasFields,
        HasIndex,
        HasIndexOptions,
        HasIndexPrefixes,
        HasIndexPhrases,
        HasNorms,
        HasPositionIncrementGap,
        HasStore,
        HasSearchAnalyzer,
        HasSimilarity,
        HasTermVector,
        HasMeta,
        HasCopyTo;

    private ?bool $fieldData = null;
    private ?array $fieldDataFrequencyFilter = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::TEXT;
    }

    public function getFieldData(): ?bool
    {
        return $this->fieldData;
    }

    public function setFieldData(?bool $value): self
    {
        $this->fieldData = $value;
        return $this;
    }

    /**
     * @return array{
     *     min: float,
     *     max: float,
     *     min_segment_size: int
     * }|null
     */
    public function getFieldDataFrequencyFilter(): ?array
    {
        return $this->fieldDataFrequencyFilter;
    }

    public function setFieldDataFrequencyFilter(
        float $min,
        float $max,
        int $minSegmentSize
    ): self {
        $this->fieldDataFrequencyFilter = [
            'min' => $min,
            'max' => $max,
            'min_segment_size' => $minSegmentSize,
        ];
        return $this;
    }

    public function clearFieldDataFrequencyFilter(): self
    {
        $this->fieldDataFrequencyFilter = null;
        return $this;
    }

    protected function buildData(): array
    {
        $result = [];

        if (null !== $this->fieldData) {
            $result['fielddata'] = $this->fieldData;
        }

        if (null !== $this->fieldDataFrequencyFilter) {
            $result['fielddata_frequency_filter'] = $this->fieldDataFrequencyFilter;
        }

        return $result;
    }
}
