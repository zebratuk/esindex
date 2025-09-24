<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Behavior\Index\Settings\Analysis\HasMaxTokenLength;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-uaxurlemail-tokenizer.html
 */
class UaxUrlEmail extends AbstractTokenizer
{
    use HasMaxTokenLength;

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::UAX_URL_EMAIL;
    }
}
