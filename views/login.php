<?php include('layout/header.php'); ?>

<form class="row" action="<?php echo baseUri('post-login') ?>" method="POST">

    <?php displayAllFlashMessages() ?>

    <div class="mb-3">
        <label for="email" class="form-label">Adresse mail</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="******">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Connexion</button>
    </div>
</form>

<?php include('layout/footer.php') ?>