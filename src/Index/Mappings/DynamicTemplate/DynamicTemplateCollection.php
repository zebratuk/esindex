<?php
declare(strict_types=1);

namespace Esindex\Index\Mappings\DynamicTemplate;

use Esindex\Builder\Exception\AssertExceptionBuilder;
use Esindex\Common\JsonStructCollection;
use Esindex\Contracts\Index\Mappings\DynamicTemplateInterface;
use Esindex\Contracts\JsonStructInterface;

/**
 * @extends JsonStructCollection<DynamicTemplateInterface>
 */
class DynamicTemplateCollection extends JsonStructCollection
{
    protected function assertItem(JsonStructInterface $item): void
    {
        if (!$item instanceof DynamicTemplateInterface) {
            throw AssertExceptionBuilder::build(DynamicTemplateInterface::class, get_class($item));
        }
    }

    public function toArray(): array
    {
        return \array_values(
            parent::toArray()
        );
    }
}
