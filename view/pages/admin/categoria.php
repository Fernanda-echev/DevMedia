
<?php
require_once __DIR__ . '/../../../model/CategoriaModel.php';
require_once __DIR__ . '/../../../config/env.php';

$categoriaModel = new CategoriaModel();

$modo = "CRIACAO";
$categoria = ["id_cat" => "", "nome" => ""];

if (isset($_GET['id_cat'])) {
    $modo = "EDICAO";
    $categoria = $categoriaModel->buscarPorId($_GET['id_cat']) ?? ["id_cat" => "", "nome" => ""];
}
?>


<?php require_once __DIR__ . '/../../components/head.php'; ?>
<body class="container-adm">
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Categorias >> <?= $modo == "EDICAO" ? "Editar" : "Criar" ?></h3>

        <form class="form" method="POST" action="categoria_salvar.php">
            <input type="hidden" name="id_cat" value="<?= ($categoria['id_cat']) ?>">

            <div class="form-content">
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input name="nome" type="text" value="<?= ($categoria['nome']) ?>" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/categorias.php' ?>">
                        <button class="btn" type="button">
                            Cancelar
                        </button>
                </a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </main>
</body>
