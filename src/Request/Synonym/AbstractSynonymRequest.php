<?php
declare(strict_types=1);

namespace Esindex\Request\Synonym;

use Esindex\Request\AbstractRequest;

abstract class AbstractSynonymRequest extends AbstractRequest
{
    protected const FIELD_SET_ID = 'set_id';
    protected const FIELD_RULE_ID = 'rule_id';
}
