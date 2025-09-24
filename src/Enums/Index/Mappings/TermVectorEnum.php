<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/term-vector.html
 */
enum TermVectorEnum: string
{
    case NO = 'no';
    case YES = 'yes';
    case WITH_POSITIONS = 'with_positions';
    case WITH_OFFSETS = 'with_offsets';
    case WITH_POSITIONS_OFFSETS = 'with_positions_offsets';
    case WITH_POSITIONS_PAYLOADS = 'with_positions_payloads';
    case WITH_POSITIONS_OFFSETS_PAYLOADS = 'with_positions_offsets_payloads';
}
