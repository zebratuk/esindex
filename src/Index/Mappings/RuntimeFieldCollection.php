<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Mappings\RuntimeFieldInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<RuntimeFieldInterface>
 */
class RuntimeFieldCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof RuntimeFieldInterface) {
            throw AssertExceptionBuilder::build(RuntimeFieldInterface::class, get_class($item));
        }
    }
}
