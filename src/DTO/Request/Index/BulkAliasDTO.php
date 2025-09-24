<?php
declare(strict_types=1);

namespace Esindex\DTO\Request\Index;

use Esindex\Contracts\Arrayable;
use Esindex\Enums\Index\BulkAliasActionEnum;
use Esindex\Index\Aliases\BulkAlias;

class BulkAliasDTO implements Arrayable, \JsonSerializable
{
    public function __construct(
        readonly private BulkAliasActionEnum $action,
        readonly private BulkAlias $alias
    ) {
    }

    public function getAction(): BulkAliasActionEnum
    {
        return $this->action;
    }

    public function getAlias(): BulkAlias
    {
        return $this->alias;
    }

    public function toArray(): array
    {
        return [
            $this->action->value => $this->alias->toArray()
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
