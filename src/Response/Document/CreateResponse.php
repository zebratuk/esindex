<?php
declare(strict_types=1);

namespace Esindex\Response\Document;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Response\Document\DocumentDTO;

/**
 * @link https://www.elastic.co/docs/api/doc/elasticsearch/v8/operation/operation-create
 */
class CreateResponse implements ResponseInterface
{
    public function __construct(
        readonly public DocumentDTO $response
    ) {
    }

    public function toArray(): array
    {
        return $this->response->toArray();
    }
}
