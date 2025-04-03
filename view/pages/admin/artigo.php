<?php
    require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../../model/ArtigoModel.php';
    require_once __DIR__ . '/../../../model/CategoriaModel.php';

    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->listar();
    

    // modo edição ou criação
    if (isset($_GET['id_artigo'])) {

        $modo = "EDICAO";
        $artigoModel = new ArtigoModel();
        $artigo = $artigoModel->buscarPorId($_GET['id_artigo']) ?? ["id_artigo" => "", "titulo" => "", "id_cat"=>"", "conteudo"=>""];
    } else {
        $modo = 'CRIACAO';
        $artigo = [
            'id_artigo'=> '',
            'titulo'=> '',
            'conteudo'=> '',
            'id_cat'=> '',
        ];
    }

?>

<?php require_once __DIR__ . '/../../components/head.php'; ?>

<body class="container-adm">
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Usuários >> <?= $modo == "EDICAO" ? "Editar " : "Criar" ?></h3>

        <div class="container">
            <form class="form" method="POST" action="artigo_salvar.php">
                <div class="form-content">
                    <input name="id_artigo" type="hidden" value="<?= $artigo['id_artigo'] ?>">

                    <div class="input-group">
                        <label for="id_cat">Categoria</label>
                        <select name="id_cat" required>
                            <option value="">Selecione...</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?= $categoria['id_cat'] ?>"
                                    <?= isset($artigo['id_cat']) && $artigo['id_cat'] == $categoria['id_cat'] ? 'selected' : '' ?>>
                                    <?= $categoria['nome'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="titulo">Título</label>
                        <input name="titulo" type="text" value="<?= $artigo['titulo'] ?>" required>
                    </div>

                    <div class="input-group">
                        <label for="conteudo">Conteúdo</label>
                        <textarea name="conteudo" rows="30" required><?= $artigo['conteudo'] ?></textarea>
                    </div>
                </div>

               

                <div class="form-actions">
                    <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigos.php' ?>">
                        <button class="btn" type="button">
                            Cancelar
                        </button>
                    </a>
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </main>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>

    <script src="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_JS'] ?>main.js"></script>
</body>

</html>