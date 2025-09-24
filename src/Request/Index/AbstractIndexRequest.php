<?php
declare(strict_types=1);

namespace Esindex\Request\Index;

use Esindex\Request\AbstractRequest;

abstract class AbstractIndexRequest extends AbstractRequest
{
    public const WILDCARD_ALL = '_all';
}
