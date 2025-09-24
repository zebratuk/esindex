<?php
declare(strict_types=1);

namespace Esindex\Index;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\Resolver\SimpleReflectionResolver;
use Esindex\Behavior\Index\Mappings\HasDynamic;
use Esindex\Behavior\Index\Mappings\HasEnabled;
use Esindex\Behavior\Index\Mappings\HasProperties;
use Esindex\Contracts\Arrayable;
use Esindex\Index\Mappings\Source;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/explicit-mapping.html
 */
class Mappings implements Arrayable
{
    use HasProperties,
        HasDynamic,
        HasEnabled;

    private ?Source $source = null;

    #[ArrayableFieldOption(Source::NAME)]
    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $value): self
    {
        $this->source = $value;
        return $this;
    }

    public function toArray(): array
    {
        $result = (new SimpleReflectionResolver())
            ->buildDataForInstance($this);

        return $result;
    }
}
