<?php
    require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../../model/ArtigoModel.php';

    $artigoModel = new ArtigoModel();
    $lista = $artigoModel->listar();
?>

<?php require_once __DIR__ . '/../../components/head.php'; ?>

<body class="container-adm">
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Artigos >> Listagem</h3>

        <div class="container">
            <div class="actions">
                <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigo.php' ?>">
                    <button class="btn btn-primary">Novo</button>
                </a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Categoria</td>
                        <td>Título</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $item) { ?>
                    <tr>
                        <td><?= $item['id_artigo'] ?></td>
                        <td><?= $item['nome_categoria'] ?></td>
                        <td><?= $item['titulo'] ?></td>
                        <td class="table-actions">
                        <a
                                href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigo.php?id_artigo=' . $item['id_artigo'] ?>">
                                <span class="btn-icon material-symbols-outlined" title="Acessar">
                                    edit
                                </span>
                            </a>
                            <form method="POST"
                                action="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/artigo_excluir.php' ?>"
                                onsubmit="return confirm('Tem certeza que deseja excluir este artigo?');">
                                
                                <input type="hidden" name="id_artigo" value="<?= $item['id_artigo'] ?>">

                                <button type="submit" id="botao-excluir">
                                    <span class="btn-icon material-symbols-outlined "  title="Excluir">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php require_once __DIR__ . '/../../components/footer.php'; ?>

    <script src="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_JS'] ?>main.js"></script>
</body>

</html>