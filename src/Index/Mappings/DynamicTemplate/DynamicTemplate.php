<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\DynamicTemplate;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Mappings\DynamicTemplateInterface;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/dynamic-templates.html
 */
class DynamicTemplate implements DynamicTemplateInterface
{
    private array|string|null $matchMappingType = null;
    private array|string|null $unmatchMappingType = null;
    private ?string $matchPattern = null;
    private array|string|null $match = null;
    private array|string|null $unmatch = null;
    private array|string|null $pathMatch = null;
    private array|string|null $pathUnmatch = null;
    private ?RuntimeMapping $runtime = null;
    private ?Mapping $mapping = null;

    public function __construct(
        readonly private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    #[ArrayableFieldOption('match_mapping_type')]
    public function getMatchMappingType(): array|string|null
    {
        return $this->matchMappingType;
    }

    public function setMatchMappingType(array|string|null $value): self
    {
        $this->matchMappingType = $value;
        return $this;
    }

    #[ArrayableFieldOption('unmatch_mapping_type')]
    public function getUnmatchMappingType(): array|string|null
    {
        return $this->unmatchMappingType;
    }

    public function setUnmatchMappingType(array|string|null $value): self
    {
        $this->unmatchMappingType = $value;
        return $this;
    }

    #[FieldOption('match_pattern')]
    public function getMatchPattern(): ?string
    {
        return $this->matchPattern;
    }

    public function setMatchPattern(?string $value): self
    {
        $this->matchPattern = $value;
        return $this;
    }

    #[ArrayableFieldOption('match')]
    public function getMatch(): array|string|null
    {
        return $this->match;
    }

    public function setMatch(array|string|null $value): self
    {
        $this->match = $value;
        return $this;
    }

    #[ArrayableFieldOption('unmatch')]
    public function getUnmatch(): array|string|null
    {
        return $this->unmatch;
    }

    public function setUnmatch(array|string|null $value): self
    {
        $this->unmatch = $value;
        return $this;
    }

    #[ArrayableFieldOption('path_match')]
    public function getPathMatch(): array|string|null
    {
        return $this->pathMatch;
    }

    public function setPathMatch(array|string|null $value): self
    {
        $this->pathMatch = $value;
        return $this;
    }

    #[ArrayableFieldOption('path_unmatch')]
    public function getPathUnmatch(): array|string|null
    {
        return $this->pathUnmatch;
    }

    public function setPathUnmatch(array|string|null $value): self
    {
        $this->pathUnmatch = $value;
        return $this;
    }

    #[ArrayableFieldOption('runtime')]
    public function getRuntime(): ?RuntimeMapping
    {
        return $this->runtime;
    }

    public function setRuntime(?RuntimeMapping $value): self
    {
        $this->runtime = $value;
        return $this;
    }

    #[ArrayableFieldOption('mapping')]
    public function getMapping(): ?Mapping
    {
        return $this->mapping;
    }

    public function setMapping(?Mapping $value): self
    {
        $this->mapping = $value;
        return $this;
    }

    public function toArray(): array
    {
        $data = (new FieldOptionResolver())->buildDataForInstance($this);
        return [
            $this->getName() => $data,
        ];
    }
}
