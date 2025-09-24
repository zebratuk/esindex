<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-tokenizers.html
 */
enum TokenizerTypeEnum: string
{
    case STANDARD = 'standard';
    case LETTER = 'letter';
    case LOWERCASE = 'lowercase';
    case WHITESPACE = 'whitespace';
    case UAX_URL_EMAIL = 'uax_url_email';
    case CLASSIC = 'classic';
    case THAI = 'thai';
    case NGRAM = 'ngram';
    case EDGE_NGRAM = 'edge_ngram';
    case KEYWORD = 'keyword';
    case PATTERN = 'pattern';
    case SIMPLE_PATTERN = 'simple_pattern';
    case CHAR_GROUP = 'char_group';
    case SIMPLE_PATTERN_SPLIT = 'simple_pattern_split';
    case PATH_HIERARCHY = 'path_hierarchy';
}
