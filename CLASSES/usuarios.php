<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";

    //metodo para o banco de dados
    public function conectar($nome, $host,$usuario,$senha)
    {
        //para visualizar em todos os métodos
        global $pdo;
        global $msgErro;
        try
        {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

        }catch (PDOException $e){
            $msgErro = $e -> getMessage();

        }

    }

    public function cadastar()
    {
        global $pdo;
        global $msgErro;

    }
     
    public function logar ()
    {
        global $pdo;
        global $msgErro;
    }

}



?>
