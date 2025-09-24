<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum FieldTypeEnum: string
{
    case BINARY = 'binary';
    case BOOLEAN = 'boolean';
    case KEYWORD = 'keyword';
    case CONSTANT_KEYWORD = 'constant_keyword';
    case WILDCARD = 'wildcard';
    case TEXT = 'text';
    case MATCH_ONLY_TEXT = 'match_only_text';
    case LONG = 'long';
    case INTEGER = 'integer';
    case SHORT = 'short';
    case BYTE = 'byte';
    case DOUBLE = 'double';
    case FLOAT = 'float';
    case HALF_FLOAT = 'half_float';
    case SCALED_FLOAT = 'scaled_float';
    case UNSIGNED_LONG = 'unsigned_long';
    case DATE = 'date';
    case DATE_NANOS = 'date_nanos';
    case ALIAS = 'alias';
    case OBJECT = 'object';
    case NESTED = 'nested';
    case FLATTENED = 'flattened';
    case JOIN = 'join';
    case PASSTHROUGH = 'passthrough';
    case INTEGER_RANGE = 'integer_range';
    case FLOAT_RANGE = 'float_range';
    case LONG_RANGE = 'long_range';
    case DOUBLE_RANGE = 'double_range';
    case DATE_RANGE = 'date_range';
    case IP_RANGE = 'ip_range';
    case AGGREGATE_METRIC_DOUBLE = 'aggregate_metric_double';
    case COMPLETION = 'completion';
    case SEARCH_AS_YOU_TYPE = 'search_as_you_type';
    case TOKEN_COUNT = 'token_count';
}
