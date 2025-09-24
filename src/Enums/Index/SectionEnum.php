<?php
declare(strict_types=1);

namespace Esindex\Enums\Index;

enum SectionEnum: string
{
    case MAPPINGS = 'mappings';
    case MAPPINGS_PROPERTIES = 'mappings.properties';
    case ALIASES = 'aliases';
    case SETTINGS = 'settings';
    case SETTINGS_ANALYSIS = 'settings.analysis';
    case SETTINGS_ANALYSIS_FILTER = 'settings.analysis.filter';
    case SETTINGS_ANALYSIS_CHAR_FILTER = 'settings.analysis.char_filter';
}
