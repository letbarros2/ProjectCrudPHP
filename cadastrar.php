<?php
//instanciando classe
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
    <div id="corpo-form-Cad">
    
    <h1> Cadastrar</h1>
    
    <form method="POST">
    <input type="text" name = "nome" placeholder="Nome completo" maxlength="50">
    <input type="email"  name = "email" placeholder="Usuário" maxlength="100">  
    <input type = "password" name = "senha" placeholder="Senha" maxlength="50">
    <input type = "password" name = "confSenha"placeholder="Confirmar Senha" maxlength="50"> 
 
    <input type ="submit" value="Cadastrar">
    
    </form>
    
    </div>
<?php
//verificar se o botão foi clicado
if (isset($_POST['nome'])){

    $nome = addslashes( $_POST['nome']);
    $email = addslashes( $_POST['email']);
    $senha = addslashes( $_POST['senha']);
    $confirmarSenha = addslashes( $_POST['confSenha']);
    //verificar se todos os campos foram preenchidos
    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
{ 
    $u->conectar("projetologin","localhost","root","root");
    if($u->msgErro=="") //se ta tudo okay
 
    {
       if($senha==$confirmarSenha)
       {
        if ($u->cadastrar($nome,$email,$senha))
        {
            ?>
            <div id="msg-sucesso">
            Usuário Cadastrado com sucesso!
            </div>
            <?php
        }
        else
        {
            ?>
            <div class="msg-erro">
            Email já cadastrado
            </div>            
            
            <?php
        }

       }
       else
       {
        ?>
        <div class="msg-erro">
       Senha e confirmar senha não correspondem
        </div>            
        
        <?php
        
       }
    }
    else{
        ?>
        <div class="msg-erro"> 
        <?php echo "Erro:".$u->msgErro; ?>
        </div>
        <?php 
    }
}else{
    ?>
    <div class="msg-erro">
   Preencha todos os campos
    </div>            
    
    <?php
}
}   

?>

</body>
</html>