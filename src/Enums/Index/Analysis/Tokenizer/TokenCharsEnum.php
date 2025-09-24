<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis\Tokenizer;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-ngram-tokenizer.html
 */
enum TokenCharsEnum: string
{
    case LETTER = 'letter';
    case DIGIT = 'digit';
    case WHITESPACE = 'whitespace';
    case PUNCTUATION = 'punctuation';
    case SYMBOL = 'symbol';
    case CUSTOM = 'custom';
}
