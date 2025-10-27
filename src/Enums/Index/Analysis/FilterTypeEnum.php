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
    case DICTIONARY_DECOMPOUNDER = 'dictionary_decompounder';
    case EDGE_NGRAM = 'edge_ngram';
    case ELISION = 'elision';
    case FINGERPRINT = 'fingerprint';
    case FLATTEN_GRAPH = 'flatten_graph';
    case HUNSPELL = 'hunspell';
    case HYPHENATION_DECOMPOUNDER = 'hyphenation_decompounder';
    case KEEP_TYPES = 'keep_types';
    case KEEP = 'keep';
    case KEYWORD_MARKER = 'keyword_marker';
    case KEYWORD_REPEAT = 'keyword_repeat';
    case KSTEM = 'kstem';
    case LENGTH = 'length';
    case LIMIT = 'limit';
    case LOWERCASE = 'lowercase';
    case MIN_HASH = 'min_hash';
    case MULTIPLEXER = 'multiplexer';
    case NGRAM = 'ngram';
    case PATTERN_CAPTURE = 'pattern_capture';
    case PATTERN_REPLACE = 'pattern_replace';
    case PORTER_STEM = 'porter_stem';
    case PREDICATE_TOKEN_FILTER = 'predicate_token_filter';
    case REMOVE_DUPLICATES = 'remove_duplicates';
    case REVERSE = 'reverse';
    case SHINGLE = 'shingle';
    case STEMMER = 'stemmer';
    case STEMMER_OVERRIDE = 'stemmer_override';
    case STOP = 'stop';
    case SYNONYM = 'synonym';
    case SYNONYM_GRAPH = 'synonym_graph';
    case TRIM = 'trim';
    case TRUNCATE = 'truncate';
    case UNIQUE = 'unique';
    case UPPERCASE = 'uppercase';
    case WORD_DELIMITER = 'word_delimiter';
    case WORD_DELIMITER_GRAPH = 'word_delimiter_graph';
}
