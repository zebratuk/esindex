<?php
declare(strict_types=1);

namespace Esindex\Builder\Exception;

use Esindex\Exceptions\AssertException;

class AssertExceptionBuilder
{
    static public function build(
        string $classExpected,
        string $classGiven
    ): AssertException
    {
        return new AssertException(
            "Class {$classExpected} expected but {$classGiven} given"
        );
    }
}
