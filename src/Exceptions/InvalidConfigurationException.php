<?php
declare(strict_types=1);

namespace Esindex\Exceptions;

use Esindex\Enums\Index\SectionEnum;

class InvalidConfigurationException extends \Exception
{
    public function __construct(
        readonly public SectionEnum $section,
        readonly public string $field,
        string $message = 'Invalid configuration',
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
