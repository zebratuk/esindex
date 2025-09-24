<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Settings\Analysis\FilterInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<FilterInterface>
 */
class FilterCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof FilterInterface) {
            throw AssertExceptionBuilder::build(FilterInterface::class, get_class($item));
        }
    }
}
