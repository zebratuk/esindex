<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\CharFilter;

use Esindex\Enums\Index\Analysis\CharFilterTypeEnum;
use Esindex\Enums\Index\SectionEnum;
use Esindex\Exceptions\InvalidConfigurationException;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-mapping-charfilter.html
 */
class Mapping extends AbstractCharFilter
{
    private array $mappings = [];
    private ?string $mappingsPath = null;

    public function getMappings(): array
    {
        return $this->mappings;
    }

    public function setMappings(array $items): self
    {
        $this->mappings = [];
        foreach ($items as $from => $to) {
            $this->addMapping($from, $to);
        }

        return $this;
    }

    public function addMapping(string $from, string $to): self
    {
        $this->mappings[] = "{$from} => {$to}";
        return $this;
    }

    public function getMappingsPath(): ?string
    {
        return $this->mappingsPath;
    }

    public function setMappingsPath(?string $value): self
    {
        $this->mappingsPath = $value;
        return $this;
    }

    public function getType(): CharFilterTypeEnum
    {
        return CharFilterTypeEnum::MAPPING;
    }

    /**
     * @return array
     * @throws InvalidConfigurationException
     */
    protected function buildData(): array
    {
        $result = match(true) {
            !empty($this->mappings) => ['mappings' => $this->mappings],
            !empty($this->mappingsPath) => ['mappings_path' => $this->mappingsPath],
            default => null
        };

        if (empty($result)) {
            throw new InvalidConfigurationException(
                section: SectionEnum::SETTINGS_ANALYSIS_CHAR_FILTER,
                field: $this->getName()
            );
        }

        return $result;
    }
}
