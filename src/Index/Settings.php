<?php
declare(strict_types=1);

namespace Esindex\Index;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\Resolver\SimpleReflectionResolver;
use Esindex\Contracts\Arrayable;
use Esindex\Index\Settings\Analysis;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/index-modules.html
 */
class Settings implements Arrayable, \JsonSerializable
{
    private ?Analysis $analysis = null;
    private array $settings = [];

    #[ArrayableFieldOption(Analysis::NAME)]
    public function getAnalysis(): Analysis
    {
        return $this->analysis ??= new Analysis();
    }

    public function setAnalysis(Analysis $value): self
    {
        $this->analysis = $value;
        return $this;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setSettings(array $values): self
    {
        $this->settings = [];
        foreach ($values as $key => $value) {
            $this->addSetting($key, $value);
        }

        return $this;
    }

    public function addSetting(string $name, mixed $value): self
    {
        $this->settings[$name] = $value;
        return $this;
    }

    public function toArray(): array
    {
        $result = (new SimpleReflectionResolver())
            ->buildDataForInstance($this);

        $result = array_merge($result, $this->getSettings());

        return $result;
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
