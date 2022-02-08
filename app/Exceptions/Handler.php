<?php

namespace App\Exceptions;

use Throwable;
use App\Helpers\ValidationHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if (config('app.debug')) {
            return parent::render($request, $e);
        }

        if ($e instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($e, $request);
        }

        if ($e instanceof AuthorizationException) {
            return $this->errorResponse('Unauthorized.', Response::HTTP_UNAUTHORIZED);
        }

        if ($e instanceof ModelNotFoundException) {
            $modelName = strtolower(class_basename($e->getModel()));

            return $this->errorResponse(
                sprintf("There is no instance of %s with the specified id", $modelName),
                Response::HTTP_NOT_FOUND
            );
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse(
                'The HTTP method specified in the request is invalid.',
                Response::HTTP_METHOD_NOT_ALLOWED
            );
        }

        if ($e instanceof NotFoundHttpException) {
            return $this->errorResponse('The specified URL was not found.', Response::HTTP_NOT_FOUND);
        }

        if($e instanceof QueryException){
            return $this->errorResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($e instanceof HttpException) {
            return $this->errorResponse($e->getMessage(), $e->getStatusCode());
        }

        return $this->errorResponse(
            method_exists($e, 'getMessage') ? $e->getMessage() : 'Unexpected failure. Try again later.',
            Response::HTTP_INTERNAL_SERVER_ERROR
        );

    }

    /**
     * @param ValidationException $e
     * @param $request
     * @return JsonResponse
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request): JsonResponse
    {
        $errors = $e->validator->errors()->getMessages();

        if ($this->isFrontend($request)) {
            return redirect()->back()->withInput(
                $request->input()
            )->withErrors($errors);
        }

        $errors = ValidationHelper::formatErrors($errors);

        return $this->errorResponse(
            'Validation failed.',
            Response::HTTP_UNPROCESSABLE_ENTITY,
            ['errors' => $errors]
        );
    }

    /**
     * @param $request
     * @return bool
     */
    private function isFrontend($request): bool
    {
        return $request->acceptsHtml() && collect($request->route()->middleware())->contains('web');
    }

    protected function errorResponse(string $message, int $code, array $extras = []): JsonResponse
    {
        $response = array_merge(['message' => $message, 'code' => $code], $extras);

        return response()->json($response, $code);
    }
}
