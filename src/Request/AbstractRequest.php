<?php
declare(strict_types=1);

namespace Esindex\Request;

use Esindex\Attribute\Resolver\SimpleReflectionResolver;
use Esindex\Behavior\Request\HasErrorTrace;
use Esindex\Behavior\Request\HasFilterPath;
use Esindex\Behavior\Request\HasHuman;
use Esindex\Behavior\Request\HasPretty;
use Esindex\Contracts\RequestInterface;

abstract class AbstractRequest implements RequestInterface
{
    /**
     * @link https://www.elastic.co/docs/reference/elasticsearch/rest-apis/common-options
     */
    use HasHuman,
        HasPretty,
        HasErrorTrace,
        HasFilterPath;

    protected const FIELD_INDEX = 'index';
    protected const FIELD_BODY = 'body';

    /**
     * Build request data
     *
     * @param array $data
     * @return array
     */
    abstract protected function buildData(array $data): array;

    final public function toArray(): array
    {
        $result = (new SimpleReflectionResolver())
            ->buildDataForInstance($this);

        return $this->buildData($result);
    }
}
