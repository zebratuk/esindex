<?php
declare(strict_types=1);

namespace Esindex\Index\Settings\Analysis\Analyzer;

use Esindex\Enums\Index\Analysis\AnalyzerTypeEnum;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-whitespace-analyzer.html
 */
class Whitespace extends AbstractAnalyzer
{
    public function getType(): AnalyzerTypeEnum
    {
        return AnalyzerTypeEnum::WHITESPACE;
    }
}
