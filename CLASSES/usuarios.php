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

    public function cadastar($nome,$email,$senha)
    {
        global $pdo;
        //global $msgErro;
        //passando tudo como parametro
        //verificando se existe algum email cadastrado
        //se vai retornar ou não um id
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        //se existe algo na linha pq o row está contando as linhas
        if($sql->rowCount()>0){

            return false; //usuario cadastrado
        }
        else
        {
            // usuario não cadastrado, cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios(nome,email,senha) VALUES (:n, e:, s:)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true; //cadastrado com sucesso.

            


        }
        
        //


    }
     
    public function logar ($email, $senha)
    {
        global $pdo;
        global $msgErro;
    }

}



?>
