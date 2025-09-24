<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/index-options.html
 */
enum IndexOptionsEnum: string
{
    case DOCS = 'docs';
    case FREQS = 'freqs';
    case POSITIONS = 'positions';
    case OFFSETS = 'offsets';
}
