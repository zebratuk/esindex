<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Behavior\Index\Settings\Analysis\HasBufferSize;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-keyword-tokenizer.html
 */
class Keyword extends AbstractTokenizer
{
    use HasBufferSize;

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::KEYWORD;
    }
}
