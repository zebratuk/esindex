<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasMaxTokenLength;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-chargroup-tokenizer.html
 */
class CharGroup extends AbstractTokenizer
{
    use HasMaxTokenLength;

    private array $tokenizeOnChars = [];

    #[FieldOption('tokenize_on_chars')]
    public function getTokenizeOnChars(): array
    {
        return $this->tokenizeOnChars;
    }

    /**
     * @param string[] $items
     * @return $this
     */
    public function setTokenizeOnChars(array $items): self
    {
        $this->tokenizeOnChars = [];
        foreach ($items as $item) {
            $this->addTokenizeOnChars($item);
        }

        return $this;
    }

    /**
     * @param string $value Accepts either single characters or character groups
     * @return $this
     * @see \Esindex\Enums\Index\Analysis\Tokenizer\TokenCharsEnum
     */
    public function addTokenizeOnChars(string $value): self
    {
        $this->tokenizeOnChars[] = $value;
        return $this;
    }

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::CHAR_GROUP;
    }
}
