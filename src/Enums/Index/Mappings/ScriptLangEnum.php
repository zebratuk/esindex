<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

enum ScriptLangEnum: string
{
    /**
     * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/modules-scripting-painless.html
     * @link https://www.elastic.co/guide/en/elasticsearch/painless/8.18/painless-lang-spec.html
     */
    case PAINLESS = 'painless';
}
