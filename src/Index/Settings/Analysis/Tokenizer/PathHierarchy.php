<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasBufferSize;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pathhierarchy-tokenizer.html
 */
class PathHierarchy extends AbstractTokenizer
{
    use HasBufferSize;

    public function __construct(
        string $name,
        private ?string $delimiter = null,
        private ?string $replacement = null,
        private ?bool $reverse = null,
        private ?int $skip = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('delimiter')]
    public function getDelimiter(): ?string
    {
        return $this->delimiter;
    }

    public function setDelimiter(?string $value): self
    {
        $this->delimiter = $value;
        return $this;
    }

    #[FieldOption('replacement')]
    public function getReplacement(): ?string
    {
        return $this->replacement;
    }

    public function setReplacement(?string $value): self
    {
        $this->replacement = $value;
        return $this;
    }

    #[BooleanFieldOption('reverse')]
    public function getReverse(): ?bool
    {
        return $this->reverse;
    }

    public function setReverse(?bool $value): self
    {
        $this->reverse = $value;
        return $this;
    }

    #[FieldOption(optionLiteral: 'skip', isEmptyResultAvailable: true)]
    public function getSkip(): ?int
    {
        return $this->skip;
    }

    public function setSkip(?int $value): self
    {
        $this->skip = $value;
        return $this;
    }

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::PATH_HIERARCHY;
    }
}
