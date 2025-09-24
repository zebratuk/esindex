<?php
declare(strict_types=1);

namespace Esindex\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class BooleanFieldOption extends FieldOption
{
}
