<?php

namespace AntonioSugamele\PluginRoutes\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class RouteViewerController extends Controller
{

    public function __invoke()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            $action = $route->getActionName();

            // Se la rotta punta a un Controller con il classico formato Class@method
            if (str_contains($action, '@')) {
                [$controller, $function] = explode('@', $action);
            } else {
                // Se è una Closure (funzione anonima) o un controller Invokable
                $controller = $action;
                $function   = $action === 'Closure' ? 'Closure' : '__invoke';
            }

            return [
                'uri'        => $route->uri(),
                'method'     => implode('|', array_diff($route->methods(), ['HEAD'])), // Nascondiamo HEAD per pulizia
                'controller' => $controller,
                'function'   => $function,
            ];
        });

        return view('plugin-routes::index', compact('routes'));
    }

}