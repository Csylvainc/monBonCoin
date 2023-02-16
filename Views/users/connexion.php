<?php
if (isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);

    echo '<div class="alert alert-dismissible alert-info">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Félicitation !</h4>
    <p class="mb-0">' . $message . '</p>
</div>';
}
?>

<div class="container">
    <?php if ($errMsg) : ?>
        <div class="alert alert-dismissible alert-warning">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Attention !</h4>
            <p class="mb-0"><?= $errMsg; ?></p>
        </div>
    <?php endif ?>
    <form method="POST">
        <div class="row justify-content-around my-2">
            <div class="col-12 col-md-4">
                <label for="login">Email</label>
                <input type="text" name="login" id="email" placeholder="Votre email" class="form-control">
            </div>
            <div class="col-12 col-md-3">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
            </div>
            <button class="btn btn-secondary w-100 m-5 p-2">Connexion</button>
        </div>
    </form>
    <div class="text-center">Pas encore de compte ? <a href="inscription">S'inscrire</a></div>
</div>