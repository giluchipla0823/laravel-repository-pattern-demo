<?php

namespace App\Virtual\Http\Requests\Auth;

/**
 * @OA\Schema(
 *      title="Login Request",
 *      description="Login request body data",
 *      type="object",
 *      @OA\Xml(
 *         name="LoginRequest"
 *      ),
 *      required={"email", "password"}
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *      type="email",
     *      title="email",
     *      description="Email of the user",
     *      example="example@gmail.com"
     * )
     */
    public $email;

    /**
     * @OA\Property(
     *      type="string",
     *      title="password",
     *      description="Password of the user",
     *      example="secret"
     * )
     */
    public $password;
}
