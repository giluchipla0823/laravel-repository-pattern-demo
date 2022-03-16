<?php

namespace App\Virtual\Responses\Auth\Login;

/**
 * @OA\Schema(
 *     title="LoginBadRequestResponse",
 *     description="LoginBadRequestResponse",
 *     @OA\Xml(
 *         name="LoginBadRequestResponse"
 *     )
 * )
 */
class LoginBadRequestResponse
{
    /**
     * @OA\Property(
     *     property="jsonapi",
     *     type="object",
     *     ref="#/components/schemas/JsonApiDefinition"
     * )
     */
    public $jsonapi;

    /**
     * @OA\Property(
     *     property="code",
     *     type="integer",
     *     example=400
     * )
     */
    public $code;

    /**
     * @OA\Property(
     *     property="message",
     *     type="string",
     *     example="Incorrect access credentials."
     * )
     */
    public $message;
}
