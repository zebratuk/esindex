<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-cjk-bigram-tokenfilter.html
 */
class CjkBigram extends AbstractFilter
{
    private array $ignoredScripts = [];

    public function __construct(
        string $name,
        private ?bool $outputUnigrams = null
    ) {
        parent::__construct($name);
    }

    #[FieldOption('ignored_scripts')]
    public function getIgnoredScripts(): array
    {
        return $this->ignoredScripts;
    }

    public function setIgnoredScripts(array $items): self
    {
        $this->ignoredScripts = [];
        foreach ($items as $item) {
            $this->addIgnoredScript($item);
        }

        return $this;
    }

    public function addIgnoredScript(string $value): self
    {
        $this->ignoredScripts[] = $value;
        return $this;
    }

    #[BooleanFieldOption('output_unigrams')]
    public function getOutputUnigrams(): ?bool
    {
        return $this->outputUnigrams;
    }

    public function setOutputUnigrams(?bool $value): self
    {
        $this->outputUnigrams = $value;
        return $this;
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::CJK_BIGRAM;
    }
}
