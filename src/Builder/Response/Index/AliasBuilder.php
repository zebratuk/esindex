<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Index;

use Esindex\Index\Aliases;
use Esindex\Index\Aliases\Alias;

class AliasBuilder
{
    static public function buildAliases(array $data): Aliases
    {
        $result = new Aliases();

        foreach ($data as $aliasName => $aliasData) {
            $result->addAlias(
                self::buildAlias($aliasName, $aliasData)
            );
        }

        return $result;
    }

    static public function buildAlias(string $name, array $data): Alias
    {
        $result = new Alias($name);

        foreach ($data as $key => $value) {
            match ($key) {
                'filter' => $result->setFilter($value),
                'index_routing' => $result->setIndexRouting($value),
                'is_write_index' => $result->setIsWriteIndex((bool)$value),
                'routing' => $result->setRouting($value),
                'search_routing' => $result->setSearchRouting($value),
                'is_hidden' => $result->setIsHidden((bool)$value),
                default => null
            };
        }

        return $result;
    }
}
