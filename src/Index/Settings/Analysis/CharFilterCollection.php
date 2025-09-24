<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Settings\Analysis\CharFilterInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<CharFilterInterface>
 */
class CharFilterCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof CharFilterInterface) {
            throw AssertExceptionBuilder::build(CharFilterInterface::class, get_class($item));
        }
    }
}
