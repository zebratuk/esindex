<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis\Filter;

enum FilterEnum: string
{
    case NONE = '_none_';
    case ENGLISH = '_english_';
    case RUSSIAN = '_russian_';
}
