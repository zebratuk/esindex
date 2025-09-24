<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\FieldOption;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/copy-to.html
 */
trait HasCopyTo
{
    private ?array $optCopyTo = null;

    /**
     * @return string[]|null
     */
    #[FieldOption('copy_to')]
    public function getCopyTo(): ?array
    {
        return $this->optCopyTo;
    }

    public function setCopyTo(array|string $values): self
    {
        $this->optCopyTo = [];
        $values = is_string($values) ? [$values] : $values;
        foreach ($values as $value) {
            $this->addCopyTo($value);
        }

        return $this;
    }

    public function addCopyTo(string $value): self
    {
        $this->optCopyTo[] = $value;
        return $this;
    }
}
