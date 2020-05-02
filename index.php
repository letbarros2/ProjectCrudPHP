<?php
//instanciando
require_once'CLASSES/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title> Projeto Cunha</title>
    <link rel = "stylesheet" href="CSS/estilo.css">


</head>
<body>
    <div id="corpo-form">
    
    <h1> Entrar</h1>
    
    <form method="POST">
    
    <input type="email" placeholder="Usuário" name = "email">  
    <input type = "password" placeholder="Senha" name = "senha"> 
    <input type ="submit" value="Acessar">
    <a href = "cadastrar.php">Ainda não é inscrito ?<strong>Cadastre-se</strong>
    
    </form>
    
    </div>

    <?php
    
    if (isset($_POST['email']))
    {

        $email = addslashes( $_POST['email']);
        $senha = addslashes( $_POST['senha']);
        //verificar se todos os campos foram preenchidos
        if(!empty($email) && !empty($senha))
        {
        $u->conectar("projetologin","localhost","root","root");
        if($u->msgErro == "")
        {
                
            if ($u->logar($email,$senha))
            {
                header("location: areaPrivada.php");
            }
            else
            {
                ?>
                <div class="msg-erro">
                Email e/ou Senha Incorretos tente novamente
            </div>
                <?php
            }
        }
        else
        {
            ?>
            <div clas = "msg-erro">
            <?php echo "Erro:".$u->msgErro; ?>
            </div>
            <?php
        }
        
    }else
    {
                ?>
                <div class="msg-erro">
                preencha todos os campos
                </div>
                <?php
     
    }
}
    
    ?>

</body>






</html>