<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\Unit;

use Esindex\Contracts\Arrayable;
use Esindex\Enums\Index\Mappings\ScriptLangEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/modules-scripting-using.html
 */
class ScriptUnit implements Arrayable
{
    public function __construct(
        private string $source,
        readonly public ScriptLangEnum $language = ScriptLangEnum::PAINLESS,
        private bool $useIdAsSource = false,
        private array $params = []
    ) {
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $value): self
    {
        $this->source = $value;
        return $this;
    }

    public function getSourceKey(): string
    {
        return $this->useIdAsSource ? 'id' : 'source';
    }

    public function isUseIdAsSource(): bool
    {
        return $this->useIdAsSource;
    }

    public function setUseIdAsSource(bool $value): self
    {
        $this->useIdAsSource = $value;
        return $this;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function setParams(array $value): self
    {
        $this->params = $value;
        return $this;
    }

    public function addParam(string $key, mixed $value): self
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function toArray(): array
    {
        $result = [
            'lang' => $this->language->value,
            $this->getSourceKey() => $this->getSource(),
        ];

        $params = $this->getParams();
        if (!empty($params)) {
            $result['params'] = $params;
        }

        return $result;
    }
}
