<?php
declare(strict_types=1);

namespace Esindex\Contracts;

interface Arrayable
{
    /**
     * @return array
     */
    public function toArray(): array;
}
