<?php
declare(strict_types=1);

namespace Esindex\Request\Document;

use Esindex\Request\AbstractRequest;

abstract class AbstractDocumentRequest extends AbstractRequest
{
    public const PIPELINE_NONE = '_none';

    protected const FIELD_ID = 'id';
}
