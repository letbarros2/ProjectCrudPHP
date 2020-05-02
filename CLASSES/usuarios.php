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

    public function cadastrar($nome,$email,$senha)
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
        if($sql->rowCount() > 0){

            return false; //usuario cadastrado
        }
        else
        {
            // usuario não cadastrado, cadastrar
           
           $sql = $pdo-> prepare( "INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES (NULL, :n, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //cadastrado com sucesso.

            


        }
        
        //


    }
     
    public function logar ($email, $senha)
    {
        global $pdo;
        global $msgErro;

        //verificar se o email e senha estão cadastrados
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s ");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount()>0)
        {
            //pessoa cadastrada, então pode acessar a página privada
            //transformando dado do banco em um array
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado[''];
            //id do usuário está armazenado na sessão.
            return true; //logado com sucesso

        }else{
            return false; //não conseguiu logar

        }
        //entrar no sistema
    }
}
