<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Behavior\Index\Settings\Analysis\HasPattern;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-simplepattern-tokenizer.html
 */
class SimplePattern extends AbstractTokenizer
{
    use HasPattern;

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::SIMPLE_PATTERN;
    }
}
