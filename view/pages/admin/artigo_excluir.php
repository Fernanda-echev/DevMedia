<?php

require_once __DIR__ . '/../../../config/env.php';
require_once __DIR__ . '/../../../model/ArtigoModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['id_artigo'])) {
        $artigoModel = new ArtigoModel();
        $excluiu = $artigoModel->excluir($_POST['id_artigo']);

        if ($excluiu) {
            return header('Location: ' . APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigos.php');  
        }
    }

}

