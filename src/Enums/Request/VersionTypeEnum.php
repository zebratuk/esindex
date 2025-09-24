<?php
declare(strict_types=1);

namespace Esindex\Enums\Request;

enum VersionTypeEnum: string
{
    case INTERNAL = 'internal';
    case EXTERNAL = 'external';
    case EXTERNAL_GTE = 'external_gte';
    case FORCE = 'force';
}
