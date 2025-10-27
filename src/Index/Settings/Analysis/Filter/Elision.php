<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-elision-tokenfilter.html
 */
class Elision extends AbstractFilter
{
    /**
     * @var string[]
     */
    private array $articles = [];
    private ?string $articlesPath = null;
    private ?bool $articlesCase = null;

    /**
     * @param string $name
     * @param string[] $articles
     */
    public function __construct(
        string $name,
        array $articles = []
    ) {
        parent::__construct($name);

        $this->setArticles($articles);
    }

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::ELISION;
    }

    /**
     * @return string[]
     */
    #[ArrayableFieldOption('articles')]
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param string[] $values
     * @return $this
     */
    public function setArticles(array $values): self
    {
        $this->articles = [];
        foreach ($values as $value) {
            $this->addArticle($value);
        }

        return $this;
    }

    public function addArticle(string $value): self
    {
        $this->articles[] = $value;
        return $this;
    }

    #[FieldOption('articles_path')]
    public function getArticlesPath(): ?string
    {
        return $this->articlesPath;
    }

    public function setArticlesPath(?string $value): self
    {
        $this->articlesPath = $value;
        return $this;
    }

    #[BooleanFieldOption('articles_case')]
    public function getArticlesCase(): ?bool
    {
        return $this->articlesCase;
    }

    public function setArticlesCase(?bool $value): self
    {
        $this->articlesCase = $value;
        return $this;
    }
}
