<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Contracts\Index\Mappings\FieldInterface;
use Esindex\Index\Mappings\FieldCollection;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/properties.html
 */
trait HasProperties
{
    private ?FieldCollection $optProperties = null;

    #[ArrayableFieldOption('properties')]
    public function getProperties(): ?FieldCollection
    {
        return $this->optProperties ??= new FieldCollection();
    }

    public function setProperties(?FieldCollection $value): self
    {
        $this->optProperties = $value;
        return $this;
    }

    public function addProperty(FieldInterface $property): self
    {
        $this->getProperties()->addItem($property);
        return $this;
    }
}
