<?php
declare(strict_types=1);

namespace Esindex\DTO;

use Esindex\Contracts\Arrayable as ArrayableInterface;

class Arrayable implements ArrayableInterface
{
    private array $data = [];

    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Use dot `.` as nested separator
     *
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function addValue(
        string $key,
        mixed $value
    ): self {
        $keys = explode('.', $key);

        $lastKey = array_pop($keys);
        $data = &$this->data;
        foreach ($keys as $nsKey) {
            $data[$nsKey] ??= [];
            if (!is_array($data[$nsKey])) {
                $data[$nsKey] = [$data[$nsKey]];
            }

            $data = &$data[$nsKey];
        }

        $data[$lastKey] = $value;

        unset($data);

        return $this;
    }

    public function toArray(): array
    {
        return $this->getData();
    }
}
