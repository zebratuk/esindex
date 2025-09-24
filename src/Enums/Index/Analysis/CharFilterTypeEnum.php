<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis;

enum CharFilterTypeEnum: string
{
    case HTML_STRIP = 'html_strip';
    case MAPPING = 'mapping';
    case PATTERN_REPLACE = 'pattern_replace';
}
