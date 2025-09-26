<?php
declare(strict_types=1);

namespace Esindex\Response\Synonym;

use Esindex\Contracts\ResponseInterface;
use Esindex\DTO\Response\Synonym\ReloadAnalyzersDetailsDTO;
use Esindex\Enums\Response\Synonym\ResultEnum;

abstract class AbstractResultResponse implements ResponseInterface
{
    public function __construct(
        readonly private ResultEnum $result,
        readonly private ReloadAnalyzersDetailsDTO $reloadAnalyzersDetails
    ) {
    }

    public function getResult(): ResultEnum
    {
        return $this->result;
    }

    public function getReloadAnalyzersDetails(): ReloadAnalyzersDetailsDTO
    {
        return $this->reloadAnalyzersDetails;
    }

    public function toArray(): array
    {
        return [
            'result' => $this->result->value,
            'reload_analyzers_details' => $this->reloadAnalyzersDetails->toArray(),
        ];
    }
}
