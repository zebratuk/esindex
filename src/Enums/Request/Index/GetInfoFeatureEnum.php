<?php
declare(strict_types=1);

namespace Esindex\Enums\Request\Index;

enum GetInfoFeatureEnum: string
{
    case ALIASES = 'aliases';
    case MAPPINGS = 'mappings';
    case SETTINGS = 'settings';
}
