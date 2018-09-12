# OO em PHP

## Objetivo
- Realizar implementação orientada a objetos em um ambiente WEB com a linguagem PHP, para evidenciar ao acadêmico a usabilidade do paradigma independente da linguagem.
## Específicos
- Conhecer o funcionamento de uma aplicação web
- Conhecer a organização básica de um projeto web
- Conhecer algumas PSRs
- Implementar uma simples API RestFull

## Conteúdos para consulta
- https://www.php-fig.org/psr/psr-1/
- https://www.php-fig.org/psr/psr-2/
- https://www.php-fig.org/psr/psr-4/
### Autoloading
- https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
## Outras informações
- O arquivo index.php  = nosso método main em java
- Utilizando o servidor web embutido no PHP (dentro da pasta public)
``` 
 php -S localhost:8080 index.php
```
- deixar a vida mais fácil, trabalhar com caminhos relativos a raiz do projeto
```
chdir(dirname(__DIR__));
```

- Evitar loop em chamadas para arquivos estáticos
```
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}
```
- conexão com banco utilizando PDO
```
PDO("mysql:host=localhost; port=3306; dbname=test",
                    "user", "password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
```
- para alguns tipos de requisições específicas
```
file_get_contents('php://input');
```
- informações do servidor
```
$_SERVER
```
### Estrutura Básica
```
 App -> gateway -> tratar a requisição e direcionar para o local desejado
 Request -> traz os dados da requisição do usuário
 Response -> resposta ao usuário
 -
 /
  ../MyApp/
      ../config/
      ../src/
          ../Controller
          ../Model
          ../
      ../view/
  ../public/
        ../css/
        ../js/
        ../img/
        index.php
```
# Outros conceitos
## Router e Rotas
- Padrão ChainOfResponsability [https://sourcemaking.com/design_patterns/chain_of_responsibility]
```
/** as rotas são apontamentos, praticamente um índice que aponta para algum serviço. 
o índice é a própria URL a partir da "url base" da aplicação ex.: http://localhost:8080/pessoa/listar.
a base da url é http://localhost:8080, o restante é o que podemos utilizar como índice 
-> /pessoa/listar essa string /pessoa/listar.
Para agilidade, podemos criar uma classe para gerenciar as rotas, um roteador ou Router e assim, 
a cada nova classe criada, basta registrarmos no nosso router a rota e fazermos nossa aplicação ao executar,
solicitar ao router que a execute.
**/
   private static $routes = [];
  //criando uma rota
   $pattern = '/^' . str_replace('/', '\/', $route) . '$/';
        if (isset(self::$routes[$route])) {
            throw new Exception(" a rota {$route} já existe!");
        }
        self::$routes[$pattern] = $callback;
  //executando uma rota
          $uri = isset($request['uri']) ? $request['uri'] : "";
        foreach (self::$routes as $pattern => $callback) {
            if (preg_match($pattern, $uri,$pars)) {
                array_shift($pars);
                return call_user_func_array($callback,array_values($pars));
            }
        }
  //usando o router
 Router::createRoute("/pessoa/listar/(\w+)/([0-9]+)", function($x,$y) {
    echo "Rota executada" ;  
 });
 Router::execute($req);
```
## Http
### documentação 
- w3c [https://www.w3.org/Protocols/]
- mozila [https://developer.mozilla.org/en-US/docs/Web/HTTP]
### autenticação básica
```
    //enviar no header base64Encoded -> id:pwd
    Authorization: Basic dGVzdGU6MTIz
    // no php
    // solicitando autenticação 
    header('WWW-Authenticate: Basic realm="' . utf8_decode($text) . '"');
    // negando acesso
    header('HTTP/1.0 401 Unauthorized');
    // variáveis
    // PHP_AUTH_USER 
    // PHP_AUTH_PW
```
# Informações importantes
+ segue o mesmo conceito das aulas anteriores
+ este projeto não será concluído em um único dia
+ serão abordados vários temas do conteúdo do bimestre neste projeto
+ ao final o academico deve enviar um pull request com todas as implementações realizadas para avaliação
