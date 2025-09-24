<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Settings\Analysis\TokenizerInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<TokenizerInterface>
 */
class TokenizerCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof TokenizerInterface) {
            throw AssertExceptionBuilder::build(TokenizerInterface::class, get_class($item));
        }
    }
}
