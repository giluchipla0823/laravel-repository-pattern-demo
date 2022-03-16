<?php

namespace App\Virtual\Responses\Auth\Login;

use App\Virtual\Responses\Common\UnprocessableEntityResponse;

/**
 * @OA\Schema(
 *     title="LoginUnprocessableEntityResponse",
 *     description="LoginUnprocessableEntityResponse",
 *     @OA\Xml(
 *         name="LoginUnprocessableEntityResponse"
 *     )
 * )
 */
class LoginUnprocessableEntityResponse extends UnprocessableEntityResponse
{
//    /**
//     * @OA\Property(
//     *      type="array",
//     *      example={
//     *          {
//     *              "field": "email",
//     *              "message": "Campo requerido.",
//     *          },
//     *          {
//     *              "field": "password",
//     *              "message": "Campo requerido.",
//     *          }
//     *     },
//     *     @OA\Items(
//     *          @OA\Property(
//     *              property="field",
//     *              type="string",
//     *              example=""
//     *          ),
//     *          @OA\Property(
//     *              property="message",
//     *              type="string",
//     *              example=""
//     *          )
//     *     )
//     * )
//     */
//    public $errors;


    /**
     * @OA\Property(
     *      type="array",
     *      example={
     *          {
     *              "field": "email",
     *              "message": "Campo requerido.",
     *          },
     *          {
     *              "field": "password",
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
