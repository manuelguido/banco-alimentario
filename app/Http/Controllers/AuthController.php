<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use League\OAuth2\Server\AuthorizationServer;
use Psr\Http\Message\ServerRequestInterface;
use App\Role;

class AuthController extends Controller
{
    /**
     * login-authen function
     */
    protected $server;
    protected $tokens;
    protected $jwt;

    /**
     * Constructor
     */
    public function __construct(AuthorizationServer $server, TokenRepository $tokens, JwtParser $jwt)
    {
        $this->jwt = $jwt;
        $this->server = $server;
        $this->tokens = $tokens;
    }

    /**
     * Login en el sistema
     */
    public function login(ServerRequestInterface $request)
    {
        $controller = new AccessTokenController($this->server, $this->tokens, $this->jwt);

        $request = $request->withParsedBody($request->getParsedBody() +
        [
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'), //client id
            'client_secret' => config('services.passport.client_secret'), //client secret
        ]);

        return with(new AccessTokenController($this->server, $this->tokens, $this->jwt))
            ->issueToken($request);
    }

    /**
     * Logout del sistema
     * @return JSON.
     */
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        
        return response()->json('Cierre de sesión exitoso.', 200);
    }

    /**
     * Verificar que el usuario está autenticado
     * @return JSON.
     */    
    public function userIsAuthenticated(Request $request)
    {
        try {
            $user = $request->user();
            $authenticated = TRUE;
        } catch (\Throwable $th) {
            $authenticated = FALSE;
        }

        return response()->json(['authenticated' => $authenticated]);
    }

    /**
     * Verificar que el usuario es donante.
     * @return JSON.
     */    
    public function userIsGiver(Request $request)
    {
        $role = Role::ROLE_GIVER;
        $authenticated = $request->user()->hasRole($role);
        return response()->json(['authenticated' => $authenticated]);
    }

    /**
     * Verificar que el usuario es donante.
     * @return JSON.
     */    
    public function userIsEmployee(Request $request)
    {
        $role = Role::ROLE_EMPLOYEE;
        $authenticated = $request->user()->hasRole($role);
        return response()->json(['authenticated' => $authenticated]);
    }

    /**
     * Verificar que el usuario es donante.
     * @return JSON.
     */    
    public function userIsAdmin(Request $request)
    {
        $role = Role::ROLE_ADMIN;
        $authenticated = $request->user()->hasRole($role);
        return response()->json(['authenticated' => $authenticated]);
    }
}
