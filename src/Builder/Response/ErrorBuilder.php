<?php
declare(strict_types=1);

namespace Esindex\Builder\Response;

use Esindex\DTO\Response\ErrorDTO;
use Esindex\Response\Error;

class ErrorBuilder
{
    public static function buildResponse(array $data): Error
    {
        $error = is_string($data['error'])
            ? $data['error']
            : new ErrorDTO($data['error']);

        return new Error(
            status: (int)($data['status'] ?? Error::EMPTY_STATUS),
            error: $error
        );
    }

    public static function buildResponseFromJson(string $json): Error
    {
        return self::buildResponse(
            \json_decode($json, true)
        );
    }
}
