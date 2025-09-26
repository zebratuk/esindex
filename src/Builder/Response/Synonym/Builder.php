<?php
declare(strict_types=1);

namespace Esindex\Builder\Response\Synonym;

use Esindex\Contracts\ResponseInterface;
use Esindex\Enums\Response\Synonym\ResultEnum;
use Esindex\Response\Synonym\AbstractResultResponse;
use Esindex\Response\Synonym\CreateSetResponse;
use Esindex\Response\Synonym\DeleteRuleResponse;
use Esindex\Response\Synonym\DeleteSetResponse;
use Esindex\Response\Synonym\GetRuleResponse;
use Esindex\Response\Synonym\GetSynonymSetResponse;
use Esindex\Response\Synonym\GetSynonymsSetsResponse;
use Esindex\Response\Synonym\UpdateRuleResponse;

class Builder
{
    /**
     * @param array $data
     * @return CreateSetResponse
     */
    public static function buildCreateSetResponse(array $data): CreateSetResponse
    {
        return self::buildResultResponse(CreateSetResponse::class, $data);
    }

    /**
     * @param array $data
     * @return DeleteSetResponse
     */
    public static function buildDeleteSetResponse(array $data): DeleteSetResponse
    {
        return new DeleteSetResponse((bool)$data['acknowledged']);
    }

    /**
     * @param array $data
     * @return GetSynonymSetResponse
     */
    public static function buildGetSynonymSetResponse(array $data): GetSynonymSetResponse
    {
        return new GetSynonymSetResponse(
            count: (int)$data['count'],
            synonymsSet: SynonymSetBuilder::buildRuleCollection($data['synonyms_set'])
        );
    }

    /**
     * @param array $data
     * @return GetRuleResponse
     */
    public static function buildGetRuleResponse(array $data): GetRuleResponse
    {
        return new GetRuleResponse(
            SynonymSetBuilder::buildSynonymRuleDTO($data)
        );
    }

    /**
     * @param array $data
     * @return UpdateRuleResponse
     */
    public static function buildUpdateRuleResponse(array $data): UpdateRuleResponse
    {
        return self::buildResultResponse(UpdateRuleResponse::class, $data);
    }

    /**
     * @param array $data
     * @return DeleteRuleResponse
     */
    public static function buildDeleteRuleResponse(array $data): DeleteRuleResponse
    {
        return self::buildResultResponse(DeleteRuleResponse::class, $data);
    }

    /**
     * @param array $data
     * @return GetSynonymsSetsResponse
     */
    public static function buildGetSynonymsSetsResponse(array $data): GetSynonymsSetsResponse
    {
        return new GetSynonymsSetsResponse(
            count: (int)$data['count'],
            results: SynonymSetBuilder::buildSynonymSetCollection($data['results'])
        );
    }

    /**
     * @param string|AbstractResultResponse $className
     * @param array $data
     * @return ResponseInterface
     */
    private static function buildResultResponse(string $className, array $data): ResponseInterface
    {
        return new $className(
            result: ResultEnum::tryFrom($data['result']),
            reloadAnalyzersDetails: ResultBuilder::buildReloadAnalyzersDetails($data['reload_analyzers_details'])
        );
    }
}
