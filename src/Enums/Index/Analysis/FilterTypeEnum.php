<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis;

enum FilterTypeEnum: string
{
    case APOSTROPHE = 'apostrophe';
    case ASCIIFOLDING = 'asciifolding';
    case CJK_BIGRAM = 'cjk_bigram';
    case CJK_WIDTH = 'cjk_width';
    case CLASSIC = 'classic';
    case COMMON_GRAMS = 'common_grams';
    case CONDITION = 'condition';
    case DECIMAL_DIGIT = 'decimal_digit';
    case DELIMITED_PAYLOAD = 'delimited_payload';
    case LOWERCASE = 'lowercase';
    case STOP = 'stop';
    case SYNONYM = 'synonym';
}
