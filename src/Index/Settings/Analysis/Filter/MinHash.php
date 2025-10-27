<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Filter;

use Esindex\Attribute\BooleanFieldOption;
use Esindex\Attribute\FieldOption;
use Esindex\Enums\Index\Analysis\FilterTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-minhash-tokenfilter.html
 */
class MinHash extends AbstractFilter
{
    private ?int $bucketCount = null;
    private ?int $hashCount = null;
    private ?int $hashSetSize = null;
    private ?bool $withRotation = null;

    public function getType(): FilterTypeEnum
    {
        return FilterTypeEnum::MIN_HASH;
    }

    #[FieldOption('bucket_count')]
    public function getBucketCount(): ?int
    {
        return $this->bucketCount;
    }

    public function setBucketCount(?int $value): self
    {
        $this->bucketCount = $value;
        return $this;
    }

    #[FieldOption('hash_count')]
    public function getHashCount(): ?int
    {
        return $this->hashCount;
    }

    public function setHashCount(?int $value): self
    {
        $this->hashCount = $value;
        return $this;
    }

    #[FieldOption('hash_set_size')]
    public function getHashSetSize(): ?int
    {
        return $this->hashSetSize;
    }

    public function setHashSetSize(?int $value): self
    {
        $this->hashSetSize = $value;
        return $this;
    }

    #[BooleanFieldOption('with_rotation')]
    public function getWithRotation(): ?bool
    {
        return $this->withRotation;
    }

    public function setWithRotation(?bool $value): self
    {
        $this->withRotation = $value;
        return $this;
    }
}
