<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index;

use Esindex\Attribute\ArrayableFieldOption;
use Esindex\Index\Unit\ScriptUnit;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/modules-scripting-using.html
 */
trait HasScript
{
    private ?ScriptUnit $optScript = null;

    #[ArrayableFieldOption('script')]
    public function getScript(): ?ScriptUnit
    {
        return $this->optScript;
    }

    public function setScript(?ScriptUnit $value): self
    {
        $this->optScript = $value;
        return $this;
    }
}
