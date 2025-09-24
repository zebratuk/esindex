<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Settings;

use Esindex\Contracts\Arrayable;

interface ModuleInterface extends Arrayable
{
    public function getName(): string;
}
