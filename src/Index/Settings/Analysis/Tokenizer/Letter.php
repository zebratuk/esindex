<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-letter-tokenizer.html
 */
class Letter extends AbstractTokenizer
{
    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::LETTER;
    }
}
