<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-stemmer-override-tokenfilter.html
 */
class StemmerOverride extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $rules = [];
    private ?string $rulesPath = null;

    /**
     * @param string $name
     * @param string[] $rules
     */
    public function __construct(
        string $name,
        array $rules = []
    ) {
        parent::__construct($name);

        $this->setRules($rules);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::STEMMER_OVERRIDE;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('rules')]
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setRules(array $values): self
    {
        $this->rules = [];
        foreach ($values as $value) {
            $this->addRule($value);
        }

        return $this;
    }

    public function addRule(string $value): self
    {
        $this->rules[] = $value;
        return $this;
    }

    #[FieldOption('rules_path')]
    public function getRulesPath(): ?string
    {
        return $this->rulesPath;
    }

    public function setRulesPath(?string $value): self
    {
        $this->rulesPath = $value;
        return $this;
    }
}
