<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Settings\Analysis;

use Esindex\Attribute\ArrayEnumOption;
use Esindex\Enums\Index\Analysis\Tokenizer\TokenCharsEnum;

/**
 * https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-ngram-tokenizer.html
 */
trait HasTokenChars
{
    /**
     * @var TokenCharsEnum[]
     */
    private array $optTokenChars = [];

    /**
     * @return TokenCharsEnum[]
     */
    #[ArrayEnumOption('token_chars')]
    public function getTokenChars(): array
    {
        return $this->optTokenChars;
    }

    /**
     * @param TokenCharsEnum[] $tokens
     * @return self
     */
    public function setTokenChars(array $tokens): self
    {
        $this->optTokenChars = [];
        foreach ($tokens as $token) {
            $this->addTokenChars($token);
        }

        return $this;
    }

    public function addTokenChars(TokenCharsEnum $token): self
    {
        $this->optTokenChars[] = $token;
        return $this;
    }
}
