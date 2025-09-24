<?php
declare(strict_types=1);

namespace Esindex\Enums\Request\Document;

enum BulkActionEnum: string
{
    case INDEX = 'index';
    case CREATE = 'create';
    case DELETE = 'delete';
    case UPDATE = 'update';
}
