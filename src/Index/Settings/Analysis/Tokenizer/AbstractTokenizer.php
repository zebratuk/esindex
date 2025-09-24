<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Tokenizer;

use Esindex\Attribute\Resolver\FieldOptionResolver;
use Esindex\Contracts\Index\Settings\Analysis\TokenizerInterface;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-tokenizers.html
 */
abstract class AbstractTokenizer implements TokenizerInterface, \JsonSerializable
{
    public function __construct(
        readonly protected string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        $result = (new FieldOptionResolver())
            ->buildDataForInstance($this);

        $result['type'] = $this->getType()->value;

        return array_merge($result, $this->buildData());
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Build tokenizer settings
     *
     * @return array
     */
    protected function buildData(): array
    {
        return [];
    }
}
