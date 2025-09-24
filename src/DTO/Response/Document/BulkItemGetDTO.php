<?php
declare(strict_types=1);

namespace Esindex\DTO\Response\Document;

use Esindex\Contracts\Arrayable;

class BulkItemGetDTO implements Arrayable
{
    public function __construct(
        readonly public array $data
    ) {
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
