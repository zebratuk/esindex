<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasFlags;
use Esindex\Behavior\Index\Settings\Analysis\HasPattern;
use Esindex\Enums\Index\Analysis\TokenizerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pattern-tokenizer.html
 */
class Pattern extends AbstractTokenizer
{
    use HasPattern,
        HasFlags;

    public function __construct(
        string $name,
        private ?int $group = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('group')]
    public function getGroup(): ?int
    {
        return $this->group;
    }

    public function setGroup(?int $value): self
    {
        $this->group = $value;
        return $this;
    }

    public function getType(): TokenizerTypeEnum
    {
        return TokenizerTypeEnum::PATTERN;
    }
}
