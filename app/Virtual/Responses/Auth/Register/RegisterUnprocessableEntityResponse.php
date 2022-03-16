<?php

namespace App\Virtual\Responses\Auth\Register;

use App\Virtual\Responses\Common\UnprocessableEntityResponse;

/**
 * @OA\Schema(
 *     title="RegisterUnprocessableEntityResponse",
 *     description="RegisterUnprocessableEntityResponse",
 *     @OA\Xml(
 *         name="RegisterUnprocessableEntityResponse"
 *     )
 * )
 */
class RegisterUnprocessableEntityResponse extends UnprocessableEntityResponse
{
    /**
     * @OA\Property(
     *      type="array",
     *      example={
     *          {
     *              "field": "name",
     *              "message": "Campo requerido.",
     *          },
     *          {
     *              "field": "email",
     *              "message": "Campo requerido.",
     *          },
     *          {
     *              "field": "password",
     *              "message": "Campo requerido.",
     *          },
     *          {
     *              "field": "confirm_password",
     *              "message": "Campo requerido.",
     *          }
     *     },
     *     @OA\Items(
     *          ref="#/components/schemas/ValidationErrorsDefinition"
     *     )
     * )
     */
    public $errors;
}
