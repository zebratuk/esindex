<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\CharFilter;

use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\CharFilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-htmlstrip-charfilter.html
 */
class HtmlStrip extends AbstractCharFilter
{
    private array $escapedTags = [];

    #[FieldOption('escaped_tags')]
    public function getEscapedTags(): array
    {
        return $this->escapedTags;
    }

    public function setEscapedTags(array $tags): self
    {
        $this->escapedTags = [];
        foreach ($tags as $tag) {
            $this->addEscapedTag($tag);
        }

        return $this;
    }

    public function addEscapedTag(string $tag): self
    {
        $this->escapedTags[] = $tag;
        return $this;
    }

    public function getType(): CharFilterTypeEnum
    {
        return CharFilterTypeEnum::HTML_STRIP;
    }
}
