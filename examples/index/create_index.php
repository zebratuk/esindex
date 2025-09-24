<?php
declare(strict_types=1);

use Esindex\Builder\Response\Index\Builder;
use Esindex\Enums\Index\Mappings\FieldTypeEnum;
use Esindex\Request\Index\CreateRequest;
use Esindex\Index\Aliases;
use Esindex\Index\Aliases\Alias;
use Esindex\Index\Settings;
use Esindex\Index\Mappings;
use Esindex\Index\Mappings\Field\Number;
use Esindex\Index\Mappings\Field\Text;
use Esindex\Index\Mappings\Field\Keyword;

$request = new CreateRequest(
    name: 'index',
    aliases: new Aliases([
        new Alias('index_alias')
    ])
);

$indexMappings = new Mappings();
$indexMappings
    ->addProperty(
        new Number('id', FieldTypeEnum::INTEGER)
    )
    ->addProperty(
        new Text('_search')
    )
    ->addProperty(
        (new Text('name'))->setCopyTo('_search')
    )
    ->addProperty(
        (new Text('description'))->setCopyTo(['_search'])
    )
    ->addProperty(
        (new Keyword('tags'))
            ->setIgnoreAbove(256)
            ->setNormalizer('norm_lowercase')
    );

$indexSettings = new Settings();
$indexSettings->addSetting('index.mapping.depth.limit', 2);

$analysis = $indexSettings->getAnalysis();

$analysis->getNormalizer()->addItem(
    new Settings\Analysis\Normalizer\Lowercase('norm_lowercase')
);

$customAnalyzer = new Esindex\Index\Settings\Analysis\Analyzer\Custom(
    name: 'with_stopwords_list',
    tokenizer: \Esindex\Enums\Index\Analysis\TokenizerTypeEnum::STANDARD->value
);
$analysis->getAnalyzer()->addItem($customAnalyzer);

$customAnalyzer->addFilter(\Esindex\Enums\Index\Analysis\FilterTypeEnum::LOWERCASE->value);

$stopwordsListFilter = (new Settings\Analysis\Filter\Stop('stopwords_list'))
    ->setStopWords(['to', 'from', 'the', 'an'])
    ->setIgnoreCase(true);
$analysis->getFilter()->addItem($stopwordsListFilter);
$customAnalyzer->addFilter($stopwordsListFilter->getName());

$synonymFilter = (new Settings\Analysis\Filter\Synonym('synonyms_list'))
    ->setSynonyms([
        'pc => personal computer',
        'computer, pc, laptop',
    ]);
$analysis->getFilter()->addItem($synonymFilter);
$customAnalyzer->addFilter($synonymFilter->getName());

$request
    ->setSettings($indexSettings)
    ->setMappings($indexMappings);

/** @var \Elastic\Elasticsearch\Client $client */
$response = $client->indices()->create($request->toArray());

/** @var \Esindex\Response\Index\CreateResponse $responseModel */
$responseModel = Builder::buildCreateResponse($response->asArray());
