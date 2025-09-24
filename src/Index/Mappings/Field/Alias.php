<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Field;

use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Enums\Index\SectionEnum;
use Esindex\Exceptions\InvalidConfigurationException;
use Esindex\Index\Mappings\AbstractField;

class Alias extends AbstractField
{
    public function __construct(
        string $name,
        readonly private string $path
    ) {
        parent::__construct($name);
    }

    public function getType(): FieldTypeEnum
    {
        return FieldTypeEnum::ALIAS;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        $path = trim($this->path);
        if (empty($path)) {
            throw new InvalidConfigurationException(
                section: SectionEnum::MAPPINGS_PROPERTIES,
                field: $this->getName(),
                message: 'Invalid path'
            );
        }

        return [
            'path' => $path,
        ];
    }
}
