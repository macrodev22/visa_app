<?= $this->extend('layouts/auth_base') ?>

<?= $this->section('styles') ?>
<style>
    ul.errors {
        display:flex;
        flex-direction: column;
        list-style: none;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= session()->getFlashdata('error') ?>
<?php if (! empty($errors)) {
    echo "<ul class='errors'>";
    foreach($errors as $error) {
        echo <<<EOT
        <li class="text-danger">{$error}</li>
        EOT;
    }
    echo "</ul>";
} ?>
    <h2 class="text-center">Signup</h2>
<form action="" method="POST" class="form" enctype="multipart/form-data">
    <?= csrf_field() ?>
        <div class="form-input-group">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" value="<?php if(isset($firstname)) echo $firstname ?>">
        </div>
        <div class="form-input-group">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" value="<?php if(isset($lastname)) echo $lastname ?>">
        </div>
        <div class="form-input-group">
            <label for="email">Email</label>
            <input type="email" name=email value="<?php if(isset($email)) echo $email ?>">
        </div>
        <div class="form-input-group">
            <label for="profile">Profile picture</label>
            <input type="file" name='profile'>
        </div>
        <div class="form-input-group">
            <label for="username">Username</label>
            <input type="text" name=username value="<?php if(isset($username)) echo $username ?>">
        </div>
        <div class="form-input-group">
            <label for="password">Password</label>
            <input type="password" name=password>
        </div>
        <div class="form-input-group">
            <label for="password2">Confirm Password</label>
            <input type="password" name=password2>
        </div>
        <div class="form-input-group">
            <label for="role">Role</label>
            <select name="role" id="">
                <option value="Admin">Admin</option><option value="Visa Officer">Visa Officer</option><option value="Supervisor">Supervisor</option><option value="Manager">Manager</option>            </select>
        </div>

        <input type="submit" class="btn btn-next">
    </form>
<?= $this->endSection() ?>