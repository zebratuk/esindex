<?php
declare(strict_types=1);

namespace Esindex\Response\Index;

use Esindex\Contracts\ResponseInterface;

class CreateResponse implements ResponseInterface
{
    public function __construct(
        readonly public string $index,
        readonly public bool $shardsAcknowledged,
        readonly public bool $acknowledged
    ) {
    }

    public function toArray(): array
    {
        return [
            'index' => $this->index,
            'shardsAcknowledged' => $this->shardsAcknowledged,
            'acknowledged' => $this->acknowledged,
        ];
    }
}
