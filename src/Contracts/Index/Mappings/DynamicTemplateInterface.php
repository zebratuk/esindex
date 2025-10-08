<?php
declare(strict_types=1);

namespace Esindex\Contracts\Index\Mappings;

use Esindex\Contracts\JsonStructInterface;

interface DynamicTemplateInterface extends JsonStructInterface
{
    public const ALL_TYPES = '*';
}
