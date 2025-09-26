<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Behavior\Request\HasAllowNoIndices;
use Esindex\Behavior\Request\HasIgnoreUnavailable;
use Esindex\Enums\Request\Index\GetInfoFeatureEnum;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-indices-get
 */
class GetInfoRequest extends AbstractIndexRequest
{
    use HasAllowNoIndices,
        HasIgnoreUnavailable;

    /**
     * @var GetInfoFeatureEnum[]
     */
    private array $features = [];

    /**
     * @param string|string[] $index
     * @param GetInfoFeatureEnum[] $features
     */
    public function __construct(
        readonly private string|array $index,
        array $features = []
    ) {
        $this->setFeatures($features);
    }

    /**
     * @return string|string[]
     */
    public function getIndex(): string|array
    {
        return $this->index;
    }

    /**
     * @return GetInfoFeatureEnum[]
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param GetInfoFeatureEnum[] $values
     * @return $this
     */
    public function setFeatures(array $values): self
    {
        $this->features = [];
        foreach ($values as $value) {
            $this->addFeature($value);
        }

        return $this;
    }

    public function addFeature(GetInfoFeatureEnum $value): self
    {
        if (!in_array($value, $this->features, true)) {
            $this->features[] = $value;
        }

        return $this;
    }

    protected function buildData(array $data): array
    {
        $data[self::FIELD_INDEX] = $this->index;
        $data['features'] = array_map(
            static fn($v) => $v->value,
            $this->features
        );

        return $data;
    }
}
