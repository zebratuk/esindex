<?php
declare(strict_types=1);

namespace Esindex\Behavior\Index\Mappings;

use Esindex\Attribute\EnumFieldOption;
use Esindex\Enums\Index\Mappings\OnScriptErrorEnum;

trait HasOnScriptError
{
    /**
     * Defines what to do if the script defined by the script parameter throws an error at indexing time.
     * Accepts fail (default), which will cause the entire document to be rejected, and continue,
     * which will register the field in the document’s _ignored metadata field and continue indexing.
     * This parameter can only be set if the script field is also set.
     */
    private ?OnScriptErrorEnum $optOnScriptError = null;

    #[EnumFieldOption('on_script_error')]
    public function getOnScriptError(): ?OnScriptErrorEnum
    {
        return $this->optOnScriptError;
    }

    public function setOnScriptError(?OnScriptErrorEnum $value): self
    {
        $this->optOnScriptError = $value;
        return $this;
    }
}
