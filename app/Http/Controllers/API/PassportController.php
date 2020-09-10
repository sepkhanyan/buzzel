<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
  @OA\Info(
      description="This is user authentication API",
      version="1.0.0",
      title="Buzzel API",
 )
 **/

class PassportController extends Controller
{

    /**
      @OA\Post(
          path="/login",
          tags={"Login"},
          summary="Login",
          operationId="login",
      
          @OA\Parameter(
              name="email",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),    
          @OA\Parameter(
              name="password",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),    
          @OA\Response(
              response=200,
              description="Success",
              @OA\MediaType(
                  mediaType="application/json",
              )
          ),
          @OA\Response(
              response=401,
              description="Unauthorized"
          ),
      )
     **/

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('secret@5')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

        /**
      @OA\Post(
          path="/logout",
          tags={"Logout"},
          summary="Logout",
          operationId="logout",
      
          @OA\Parameter(
              name="token",
              in="query",
              required=true,
              @OA\Schema(
                  type="string"
              )
          ),       
          @OA\Response(
              response=200,
              description="Success",
              @OA\MediaType(
                  mediaType="application/json",
              )
          ),
          @OA\Response(
              response=401,
              description="Unauthorized"
          ),
      )
     **/

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

        /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
