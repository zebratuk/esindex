<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Settings\Analysis\NormalizerInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<NormalizerInterface>
 */
class NormalizerCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof NormalizerInterface) {
            throw AssertExceptionBuilder::build(NormalizerInterface::class, get_class($item));
        }
    }
}
