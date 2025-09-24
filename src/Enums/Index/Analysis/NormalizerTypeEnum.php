<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Analysis;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/analysis-normalizers.html
 */
enum NormalizerTypeEnum: string
{
    case LOWERCASE = 'lowercase';
    case CUSTOM = 'custom';
}
