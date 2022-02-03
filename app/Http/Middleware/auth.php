<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Models\role;
use App\Models\roleuser;

class auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        try {
            $token = JWTAuth::parseToken();
            $user = $token->authenticate();
        } catch (TokenExpiredException $e) {
            return $this->unauthorized('Tu token ha caducado. Por favor, inicie sesión nuevamente.');
        } catch (TokenInvalidException $e) {
            return $this->unauthorized('Tu token no es válido. Por favor, inicie sesión nuevamente.');
        }catch (JWTException $e) {
            return $this->unauthorized('Por favor, adjunte un token de portador a su solicitud.');
        }
        $roleuser =roleuser::where('id_users',$user->id)->select('id_role')->get();

        $estado = false;
        error_log ($roleuser);
        foreach ($roleuser as $r) {

            if(in_array($r->id_role, $roles)){
                $estado = $estado || true;
            }
            $estado = $estado || false;
        }


        if ($user && $estado) {
            return $next($request);
        }

        return $this->unauthorized();
    }

    private function unauthorized($message = null){
        return response()->json([
            'error' => 'Autorización',
            'message' => $message ? $message : 'No está autorizado para acceder a este recurso.',
            'success' => false
        ], 401);
    }
}
