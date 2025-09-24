<?php
declare(strict_types=1);

namespace Esindex\Enums\Index\Mappings;

/**
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/8.18/similarity.html
 */
enum SimilarityEnum: string
{
    case BM25 = 'BM25';
    case BOOLEAN = 'boolean';
}
