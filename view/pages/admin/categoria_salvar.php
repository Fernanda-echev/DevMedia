
<?php
require_once __DIR__ . '/../../../model/CategoriaModel.php';
// VERIFICAR SE É MÉTODO POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $categoriaModel = new CategoriaModel();

    // EXECUTO A FUNÇÃO DE CRIAR/EDITAR DO MODEL

    if (empty($_POST['id_cat'])){

        // CRIAR
        $sucesso = $categoriaModel->criar(categoria: [
            'nome' => $_POST['nome'],
        ]);
        
    } else{
        // EDITAR
        $sucesso = $categoriaModel->editar( [
            'id_cat' =>(int) $_POST['id_cat'],
            'nome' => $_POST['nome'],
        ]);
    }


    if(!$sucesso) {
        return "ERRO";
    }

}

return header('Location: categorias.php');

