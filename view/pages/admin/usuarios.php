<?php
    require_once __DIR__ . '/../../../config/env.php';
    require_once __DIR__ . '/../../../model/UsuarioModel.php';

    $usuarioModel = new UsuarioModel();
    $lista = $usuarioModel->listar();
?>

<?php require_once __DIR__ . '/../../components/head.php'; ?>

<body class="container-adm">
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>
    <?php require_once __DIR__ . '/../../components/sidebar.php'; ?>

    <main class="content-adm">
        <h3>Usuários >> Listagem</h3>

        <div class="container">
            <div class="actions">
                <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuario.php' ?>">
                    <button class="btn btn-primary">Novo</button>
                </a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Email</td>
                        <td>Nome</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $item) { ?>
                    <tr>
                        <td><?= $item['id_user'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['nome'] ?></td>
                        <td class="table-actions">
                        <a href="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuario.php?id_user=' . $item['id_user'] ?>">
                            <span class="btn-icon material-symbols-outlined" title="Editar">edit</span>
                        </a>
                        <form method="POST"
                                action="<?= APP_CONSTANTS['APP_URL'] . APP_CONSTANTS['PATH_PAGES'] . 'admin/usuario_excluir.php' ?>"
                                onsubmit="return confirm('Tem certeza que deseja excluir este usuario?');">
                                <input type="hidden" name="id_user" value="<?= $item['id_user'] ?>">
                                <button type="submit" id="botao-excluir">
                                    <span class="btn-icon material-symbols-outlined" title="Excluir">
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