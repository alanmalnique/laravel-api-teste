<?php

    namespace App\Http\Middleware;

    use Closure;
    use Exception;
    use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
    use JWTAuth;
        
    class UserAuthMiddleware extends BaseMiddleware
    {

        public function __construct(
        ){
        }

        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next, $guard = null)
        {
            try {

                $token = $request->header('Authorization');

                if (!$token) {
                    return response()->json(['erro' => true, 'mensagem' => 'Unauthorized'], 401);
                }

                JWTAuth::parseToken()->authenticate();

                if (!auth($guard)->user()) {
                    return response()->json(['erro' => true, 'mensagem' => 'Invalid token'], 401);
                }
                
            } catch (Exception $e) {
                if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                    return response()->json(['status' => 'Token is Invalid'], 401);
                }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                    return response()->json(['status' => 'Token is Expired'], 401);
                }else{
                    return response()->json(['status' => 'Authorization Token not found'], 401);
                }
            }
            
            return $next($request);
        }
    }