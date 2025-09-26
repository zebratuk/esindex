<?php
declare(strict_types=1);

namespace Esindex\Enums\Response\Synonym;

enum ResultEnum: string
{
    case CREATED = 'created';
    case UPDATED = 'updated';
    case DELETED = 'deleted';
    case NOT_FOUND = 'not_found';
    case NOOP = 'noop';
}
