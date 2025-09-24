<?php
declare(strict_types=1);

namespace Esindex\Index\Settings;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Settings\ModuleInterface;
use Esindex\Index\Settings\Analysis\AnalyzerCollection;
use Esindex\Index\Settings\Analysis\CharFilterCollection;
use Esindex\Index\Settings\Analysis\FilterCollection;
use Esindex\Index\Settings\Analysis\NormalizerCollection;
use Esindex\Index\Settings\Analysis\TokenizerCollection;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis.html
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analyzer-anatomy.html
 */
class Analysis implements ModuleInterface
{
    public const NAME = 'analysis';

    public function __construct(
        private AnalyzerCollection $analyzer = new AnalyzerCollection(),
        private TokenizerCollection $tokenizer = new TokenizerCollection(),
        private CharFilterCollection $charFilter = new CharFilterCollection(),
        private FilterCollection $filter = new FilterCollection(),
        private NormalizerCollection $normalizer = new NormalizerCollection()
    ) {
    }

    public function getName(): string
    {
        return self::NAME;
    }

    #[ArrayableFieldOption('analyzer')]
    public function getAnalyzer(): AnalyzerCollection
    {
        return $this->analyzer;
    }

    public function setAnalyzer(AnalyzerCollection $value): self
    {
        $this->analyzer = $value;
        return $this;
    }

    #[ArrayableFieldOption('tokenizer')]
    public function getTokenizer(): TokenizerCollection
    {
        return $this->tokenizer;
    }

    public function setTokenizer(TokenizerCollection $value): self
    {
        $this->tokenizer = $value;
        return $this;
    }

    #[ArrayableFieldOption('char_filter')]
    public function getCharFilter(): CharFilterCollection
    {
        return $this->charFilter;
    }

    public function setCharFilter(CharFilterCollection $value): self
    {
        $this->charFilter = $value;
        return $this;
    }

    #[ArrayableFieldOption('filter')]
    public function getFilter(): FilterCollection
    {
        return $this->filter;
    }

    public function setFilter(FilterCollection $value): self
    {
        $this->filter = $value;
        return $this;
    }

    #[ArrayableFieldOption('normalizer')]
    public function getNormalizer(): NormalizerCollection
    {
        return $this->normalizer;
    }

    public function setNormalizer(NormalizerCollection $value): self
    {
        $this->normalizer = $value;
        return $this;
    }

    public function toArray(): array
    {
        return (new FieldOptionResolver())
            ->buildDataForInstance($this);
    }
}
