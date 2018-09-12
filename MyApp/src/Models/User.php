 <?php
namespace MyApp\Models;
/**
 * Description of User
 *
 * @author drink
 */
class User {
    
    private $id;
    private $login;
    private $senha;
    private $situacao;

    function getId() {
        return $this->id;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    
}
