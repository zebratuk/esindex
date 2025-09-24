<?php
declare(strict_types=1);

namespace Esindex\Contracts;

interface WithNameInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
