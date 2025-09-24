<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Settings\Analysis\AnalyzerInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<AnalyzerInterface>
 */
class AnalyzerCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof AnalyzerInterface) {
            throw AssertExceptionBuilder::build(AnalyzerInterface::class, get_class($item));
        }
    }
}
