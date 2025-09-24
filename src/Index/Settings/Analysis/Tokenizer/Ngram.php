<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasTokenChars;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-ngram-tokenizer.html
 */
class Ngram extends AbstractTokenizer
{
    use HasTokenChars;

    public function __construct(
        string $name,
        private ?int $minGram = null,
        private ?int $maxGram = null,
        private ?string $customTokenChars = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('min_gram')]
    public function getMinGram(): ?int
    {
        return $this->minGram;
    }

    public function setMinGram(?int $value): self
    {
        $this->minGram = $value;
        return $this;
    }

    #[FieldOption('max_gram')]
    public function getMaxGram(): ?int
    {
        return $this->maxGram;
    }

    public function setMaxGram(?int $value): self
    {
        $this->maxGram = $value;
        return $this;
    }

    #[FieldOption('custom_token_chars')]
    public function getCustomTokenChars(): ?string
    {
        return $this->customTokenChars;
    }

    public function setCustomTokenChars(?string $value): self
    {
        $this->customTokenChars = $value;
        return $this;
    }

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::NGRAM;
    }
}
