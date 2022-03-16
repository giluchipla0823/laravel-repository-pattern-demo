<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

///**
// * @OA\Info(title="API BookStore", version="1.0")
// *
// * @OA\Server(url="http://127.0.0.1:8000/api/documentation")
// */

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API BookStore",
 *      description="",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API BookStore"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="API Endpoints of Auth"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
