<?= $this->extend('layouts/auth_base') ?>
<?= $this->section('content') ?>
<h1><?= $staff_role ?> Login</h1>

<form action="" method="POST" class="form">
    <?= csrf_field() ?>
    <div>
        <p><?php $error=session()->getFlashData('login_error');  if(isset($error)) { echo $error; } ?></p>
    </div>
    <div class="form-input-group">
        <label for="username">Username or email</label>
        <input type="text" name="username">
    </div>

    <div class="form-input-group">
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>

    <div class="form-input-group d-flex jc-sb">
        <a href="/signup" class="btn btn-secondary ">Signup</a>
        <input type="submit" value="Login" class="btn">
    </div>

</form>

<?= $this->endSection() ?>