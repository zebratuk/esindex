<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Mappings\HasDocValues;
use Esindex\Behavior\Index\Mappings\HasEagerGlobalOrdinals;
use Esindex\Behavior\Index\Mappings\HasIgnoreAbove;
use Esindex\Behavior\Index\Mappings\HasIndex;
use Esindex\Behavior\Index\Mappings\HasIndexOptions;
use Esindex\Behavior\Index\Mappings\HasNullValue;
use Esindex\Behavior\Index\Mappings\HasSimilarity;
use Esindex\Behavior\Index\Mappings\HasSplitQueriesOnWhitespace;
use Esindex\Behavior\Index\Mappings\HasTimeSeriesDimension;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Index\Mappings\AbstractField;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/flattened.html
 */
class Flattened extends AbstractField
{
    use HasDocValues,
        HasEagerGlobalOrdinals,
        HasIgnoreAbove,
        HasIndex,
        HasIndexOptions,
        HasNullValue,
        HasSimilarity,
        HasTimeSeriesDimension,
        HasSplitQueriesOnWhitespace;

    private ?int $depthLimit = null;

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::FLATTENED;
    }

    #[FieldOption('depth_limit')]
    public function getDepthLimit(): ?int
    {
        return $this->depthLimit;
    }

    public function setDepthLimit(?int $value): self
    {
        $this->depthLimit = $value;
        return $this;
    }
}
