<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-analyzers.html
 */
enum AnalyzerTypeEnum: string
{
    case STANDARD = 'standard';
    case SIMPLE = 'simple';
    case WHITESPACE = 'whitespace';
    case STOP = 'stop';
    case KEYWORD = 'keyword';
    case PATTERN = 'pattern';
    case FINGERPRINT = 'fingerprint';
    case CUSTOM = 'custom';

    case ENGLISH = 'english';
    case RUSSIAN = 'russian';
}
