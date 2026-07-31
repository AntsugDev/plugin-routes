<?php

namespace AntonioSugamele\PluginRoutes\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class RouteViewerController extends Controller
{

    public function __invoke()
    {
        $search = request()->query('search');
        $routes = collect(Route::getRoutes());
        if(!is_null($search)) {
           $routes = $routes->filter(function ($route) use ($search) {
               return stristr($route->uri(), $search) !== false;
           })->values();
        }
        $routes = $routes->map(function ($route) use($search) {
            $action = $route->getActionName();

            // Se la rotta punta a un Controller con il classico formato Class@method
            if (str_contains($action, '@')) {
                [$controller, $function] = explode('@', $action);
            } else {
                // Se è una Closure (funzione anonima) o un controller Invokable
                $controller = $action;
                $function   = $action === 'Closure' ? 'Closure' : '__invoke';
            }
            $uri = $route->uri();
            return [
                'uri'        => trim($uri),
                'method'     => implode('|', array_diff($route->methods(), ['HEAD'])), // Nascondiamo HEAD per pulizia
                'controller' => trim($controller),
                'function'   => trim($function),
            ];
        });

        return view('plugin-routes::index', compact('routes'));
    }



}