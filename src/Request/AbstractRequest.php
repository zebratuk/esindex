<?php
declare(strict_types=1);

namespace Esindex\Request;

use Esindex\Attribute\Resolver\SimpleReflectionResolver;
use Esindex\Behavior\Request\HasErrorTrace;
use Esindex\Behavior\Request\HasFilterPath;
use Esindex\Behavior\Request\HasHuman;
use Esindex\Behavior\Request\HasPretty;
use Esindex\Common\ArrayUtil;
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
    protected const FIELD_ID = 'id';

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

        $result = $this->buildData($result);

        if (!empty($result[self::FIELD_BODY])) {
            $result[self::FIELD_BODY] = ArrayUtil::filterNullValues($result[self::FIELD_BODY]);
        }

        return ArrayUtil::filterNullValues($result);
    }
}
