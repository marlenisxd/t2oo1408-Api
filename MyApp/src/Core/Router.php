<?php

namespace MyApp\Core;

/**
 * Description of Router
 *
 * @author drink
 */
class Router {
    
    private static $rotas = [];
    
    public static function createRoute($rota,$callable){
        if (isset(self::$rotas[$rota]) ) {
            throw new \Exception("A rota já existe!");
        }
        self::$rotas[$rota] = $callable; 
    }
    public static function executeRoute($request){
        if (isset(self::$rotas[$request])) {
            return call_user_func(self::$rotas[$request]);
        }
    }
}
