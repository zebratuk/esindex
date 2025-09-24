<?php
declare(strict_types=1);

namespace Esindex\Index\Aliases;

class BulkAlias extends Alias
{
    public function __construct(
        string $name,
        readonly private string|array $index,
        readonly private array $aliases = [],
        readonly private ?bool $mustExist = null
    ) {
        parent::__construct($name);
    }

    public function toArray(): array
    {
        $result = parent::toArray();

        unset($result['name']);

        $aliases = $this->aliases;
        $aliases[] = $this->getName();
        $result['aliases'] = array_unique($aliases);

        if (is_string($this->index)) {
            $result['index'] = $this->index;
        } else {
            $result['indices'] = $this->index;
        }

        if (null !== $this->mustExist) {
            $result['must_exist'] = $this->mustExist;
        }

        return $result;
    }
}
