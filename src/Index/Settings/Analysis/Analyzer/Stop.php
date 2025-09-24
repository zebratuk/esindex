<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Attribute\FieldOption;
use Esindex\Behavior\Index\Settings\Analysis\HasStopWords;
use Esindex\Enums\Index\Analysis\AnalyzerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-stop-analyzer.html
 */
class Stop extends AbstractAnalyzer
{
    use HasStopWords;

    public function getType(): AnalyzerTypeEnum
    {
        return AnalyzerTypeEnum::STOP;
    }
}
