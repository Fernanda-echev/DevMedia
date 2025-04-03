
<?php
require_once __DIR__ . '/../../../model/UsuarioModel.php';



// VERIFICAR SE É MÉTODO POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuarioModel = new UsuarioModel();


    // EXECUTO A FUNÇÃO DE CRIAR/EDITAR DO MODEL

    if (empty($_POST['id_user'])){

        // CRIAR
        $sucesso = $usuarioModel->criar([
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'data_nasc' => $_POST['data_nasc'], 
            'cpf' => $_POST['cpf'], 
            'telefone' => $_POST['telefone'], 
        ]);
        
        
    } else{
        // EDITAR
        $sucesso = $usuarioModel->editar([
            'id_user' => $_POST['id_user'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'data_nasc' => $_POST['data_nasc'], 
            'cpf' => $_POST['cpf'], 
            'telefone' => $_POST['telefone'], 
        ]);
        
    }


    if(!$sucesso) {
        return "ERRO";
    }

}

return header('Location: usuarios.php');




