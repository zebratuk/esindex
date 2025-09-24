<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/position-increment-gap.html
 */
trait HasPositionIncrementGap
{
    private ?int $optPositionIncrementGap = null;

    #[FieldOption('position_increment_gap')]
    public function getPositionIncrementGap(): ?int
    {
        return $this->optPositionIncrementGap;
    }

    public function setPositionIncrementGap(?int $value): self
    {
        $this->optPositionIncrementGap = $value;
        return $this;
    }
}
