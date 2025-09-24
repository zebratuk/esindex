<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Contracts\Index\Mappings\FieldInterface;
use Esindex\Index\Mappings\FieldCollection;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/multi-fields.html
 */
trait HasFields
{
    private ?FieldCollection $optFields = null;

    #[ArrayableFieldOption('fields')]
    public function getFields(): ?FieldCollection
    {
        return $this->optFields ??= new FieldCollection();
    }

    public function setFields(?FieldCollection $value): self
    {
        $this->optFields = $value;
        return $this;
    }

    public function addField(FieldInterface $property): self
    {
        $this->getFields()->addItem($property);
        return $this;
    }
}
