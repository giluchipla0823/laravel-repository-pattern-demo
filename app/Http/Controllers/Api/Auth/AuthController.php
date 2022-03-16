<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Auth\AuthService;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends ApiController
{
    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(
        AuthService $authService
    ){
        $this->authService = $authService;
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Auth"},
     *     summary="Iniciar sesión",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/LoginSuccessResponse")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Validation failed.",
     *         @OA\JsonContent(ref="#/components/schemas/LoginUnprocessableEntityResponse")
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Incorrect access credentials.",
     *         @OA\JsonContent(ref="#/components/schemas/LoginBadRequestResponse")
     *     )
     * )
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request): JsonResponse {
        $response = $this->authService->login($request->all());

        return $this->successResponse($response);
    }

    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Auth"},
     *     summary="Registrar usuario",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/RegisterSuccessResponse")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Validation failed.",
     *         @OA\JsonContent(ref="#/components/schemas/RegisterUnprocessableEntityResponse")
     *     )
     * )
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $response = $this->authService->register($request->all());

        return $this->successResponse($response, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get (
     *     path="/api/logout",
     *     tags={"Auth"},
     *     summary="Cerrar sesión",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/LogoutSuccessResponse")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized.",
     *         @OA\JsonContent(ref="#/components/schemas/UnauthorizedResponse")
     *     ),
     *     security={{"sanctum": {}}},
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        if(method_exists($request->user()->currentAccessToken(), 'delete')) {
            $request->user()->currentAccessToken()->delete();
        } else {
            auth()->guard('web')->logout();
        }

        return $this->showMessage('Se ha cerrado la sesión del usuario.');
    }


}
