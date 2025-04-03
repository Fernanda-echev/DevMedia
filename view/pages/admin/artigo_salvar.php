
<?php
require_once __DIR__ . '/../../../model/ArtigoModel.php';



// VERIFICAR SE É MÉTODO POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $artigoModel = new ArtigoModel();


    // EXECUTO A FUNÇÃO DE CRIAR/EDITAR DO MODEL

    if (empty($_POST['id_artigo'])){

        // CRIAR
        $sucesso = $artigoModel->criar(artigo:[
            'titulo' => $_POST['titulo'],
            'conteudo' => $_POST['conteudo'],
            'id_cat' => $_POST['id_cat'], 
        ]);
        
        
    } else{
        // EDITAR
        $sucesso = $artigoModel->editar([
            'id_artigo' => (int) $_POST['id_artigo'],
            'titulo' => $_POST['titulo'],
            'conteudo' => $_POST['conteudo'],
            'id_cat' => $_POST['id_cat'],
        ]);
        
    }


    if(!$sucesso) {
        return "ERRO";
    }

}

return header('Location: artigos.php');











