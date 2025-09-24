<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Enums\Index\SectionEnum;
use Esindex\Exceptions\InvalidConfigurationException;
use Esindex\Index\Mappings\AbstractField;

class Join extends AbstractField
{
    /**
     * @var string[]
     */
    private array $relations = [];

    public function __construct(
        string $name,
        array $relations = []
    ) {
        parent::__construct($name);

        $this->setRelations($relations);
    }

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::JOIN;
    }

    public function getRelations(): array
    {
        return $this->relations;
    }

    public function setRelations(array $values): self
    {
        $this->relations = [];
        foreach ($values as $value) {
            $this->addRelation($value);
        }

        return $this;
    }

    public function addRelation(string $value): self
    {
        $this->relations[] = trim($value);
        return $this;
    }

    protected function buildData(): array
    {
        $relations = array_filter($this->relations);
        if (empty($relations)) {
            throw new InvalidConfigurationException(
                section: SectionEnum::MAPPINGS_PROPERTIES,
                field: $this->getName(),
                message: 'Invalid relations'
            );
        }

        return [
            'relations' => $relations,
        ];
    }
}
