<?php

namespace App\Virtual\Responses\Auth\Register;

use App\Virtual\Responses\Common\CreatedResponse;

/**
 * @OA\Schema(
 *     title="RegisterSuccessResponse",
 *     description="RegisterSuccessResponse",
 *     @OA\Xml(
 *         name="RegisterSuccessResponse"
 *     )
 * )
 */
class RegisterSuccessResponse extends CreatedResponse
{
    /**
     * @OA\Property(
     *     property="message",
     *     type="string",
     *     example="User created successfully."
     * )
     */
    public $message;

    /**
     * @OA\Property(
     *     property="data",
     *     type="object",
     *     example={
     *       "id": 1,
     *       "name": "Test",
     *       "email": "example@gmail.com",
     *       "token": "11|5q36HxnTRbxPLIROxnB7oxK0xMSrhmHw32g9jeem"
     *     }
     * )
     */
    public $data;
}
