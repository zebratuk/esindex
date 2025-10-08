<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Mappings\FieldInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<FieldInterface>
 */
class FieldCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof FieldInterface) {
            throw AssertExceptionBuilder::build(FieldInterface::class, get_class($item));
        }
    }
}
