<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasPreserveOriginal;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-pattern-capture-tokenfilter.html
 */
class PatternCapture extends AbstractFilter
{
    use HasPreserveOriginal;

    /**
     * @var string[]
     */
    private array $patterns = [];

    /**
     * @param string $name
     * @param string[] $patterns
     */
    public function __construct(
        string $name,
        array $patterns
    ) {
        parent::__construct($name);

        $this->setPatterns($patterns);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::PATTERN_CAPTURE;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('patterns')]
    public function getPatterns(): array
    {
        return $this->patterns;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setPatterns(array $values): self
    {
        $this->patterns = [];
        foreach ($values as $value) {
            $this->addPattern($value);
        }

        return $this;
    }

    public function addPattern(string $value): self
    {
        $this->patterns[] = $value;
        return $this;
    }
}
