<?php
namespace MyApp\Services;
/**
 * Description of Singleton
 *
 * @author drink
 */
class Singleton {
    
 
    /// Declare um atributo static e private para guardar a instancia
    /// Declare um atributo private para guardar o PDO
    /// declare um construtor privado
    /// declare um método publico para retornar o PDO
    /// declare um método publico static para retornar a instancia
    /**
     *
     * @var Singleton 
     */
    private static $instance;
    private $pdo;
    
    private function __construct() {
        $this->pdo = new \PDO("mysql:host=localhost; port=3306; dbname=singleton",
                    "devel", "developer",
              array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    
    public function getPdo(){
        return $this->pdo;
    }
    
    public static function getInstance(){
        
        if (!self::$instance){
            self::$instance = new Singleton();
        }
        return self::$instance;
        
    }
}
