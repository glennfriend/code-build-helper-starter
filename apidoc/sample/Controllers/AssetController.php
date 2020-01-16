<?php
declare(strict_types=1);
namespace Modules\Action\Http\Controllers;

use Exception;
use Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Validation\ValidationException;

class AssetController extends Controller
{
    public function __construct(
        AssetService $assetService,
        ActionTemplateService $actionTemplateService,
        AssetTemplateService $assetTemplateService,
        EmailVariableManagerService $emailVariableManagerService)
    {
        $this->assetService = $assetService;
        $this->actionTemplateService = $actionTemplateService;
        $this->assetTemplateService = $assetTemplateService;
        $this->emailVariableManagerService = $emailVariableManagerService;
    }

    /**
     * GET list
     *
     * @param Request $request
     * @param int $accountId
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, int $accountId)
    {
        $page = (int) $request->input('page');
        $filter = $request->input('filter', []);
        $sort = array(
            "order" => $request->input('sort'),
            "key" => $request->input('sortKey'),
        );

        $assets = $this->assetService->findByAccountId($accountId, $page, $filter, $sort);

        return AssetResource::collection($assets);
    }

    /**
     * GET show
     *
     * @param Request $request
     * @param int $accountId
     * @param int $assetId
     * @return Response|AssetResource
     */
    public function show(Request $request, int $accountId, int $assetId)
    {
        $asset = $this->assetService->get($assetId);
        if (! $asset) {
            return $this->error(null, 404);
        }

        list($error, $code) = $this->accountValidate($asset, $accountId);
        if ($error) {
            return $this->error($error, $code);
        }

        return new AssetResource($asset);
    }

}

/**
 * @apiGroup Asset
 * @apiName list
 * @api {GET} /api/accounts/:account_id/assets list
 * @apiSampleRequest /api/accounts/:account_id/assets
 * @apiParam {int} account_id
 * @apiParam {int} page
 * @apiParam {string} filter[name]
 * @apiParam {int}    filter[app_integration_id]
 *
 * @apiSuccessJson {file=../Tests/Data/Controllers/asset_list_response.json} Response: 200 OK
 */

/**
 * @apiGroup Asset
 * @apiName show
 * @api {GET} /api/accounts/:account_id/assets/:assetId show
 * @apiSampleRequest /api/accounts/:account_id/assets/:assetId
 * @apiParam {int} account_id
 * @apiParam {int} assetId
 *
 * @apiSuccessJson {file=../Tests/Data/Controllers/asset_show_response.json} Response: 200 OK
 */

/**
 * @apiGroup Asset
 * @apiName store
 * @api {POST} /api/accounts/:account_id/assets store
 * @apiSampleRequest off
 * @apiParam {int} account_id
 * @apiParamJson    {file=../../Tests/Data/Controllers/asset_store.json} Request
 *
 * @apiParamExample curl
 *  curl \
 *      -X POST http://127.0.0.1:3000/api/accounts/1/assets \
 *      -H "Content-Type: application/json" \
 *      -d @"Modules/Action/Tests/Data/Controllers/asset_store.json"
 * @apiSuccessJson  {file=../Tests/Data/Controllers/asset_show_response.json} Response: 201 Created
 */

/**
 * @apiGroup Asset
 * @apiName update
 * @api {PATCH} /api/accounts/:account_id/assets/assetId update
 * @apiSampleRequest off
 * @apiParam {int} account_id
 * @apiParam {int} assetId
 *
 * @apiParamExample Request:
 *  like "store"
 * @apiSuccessExample Response: 201 Created
 *  like "store"
 */

/**
 * @apiGroup Asset
 * @apiName delete
 * @api {DELETE} /api/accounts/:account_id/assets/:assetId delete
 * @apiParam {int} account_id
 * @apiParam {int} assetId
 *
 * @apiSuccessExample Response: 204 Not Content
 * null
 */
