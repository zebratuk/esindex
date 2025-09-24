<?php
declare(strict_types=1);

namespace Esindex\Enums\Index;

enum BulkAliasActionEnum: string
{
    case ADD = 'add';
    case REMOVE = 'remove';
    case REMOVE_INDEX = 'remove_index';
}
