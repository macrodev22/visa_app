<?= $this->extend('layouts/auth_base') ?>

<?= $this->section('content') ?>
<?= session()->getFlashdata('error') ?>

    <h2 class="text-center">Signup</h2>
<form action="" method="POST" class="form">
    <?= csrf_field() ?>

        <div class="form-input-group">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname">
        </div>
        <div class="form-input-group">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname">
        </div>
        <div class="form-input-group">
            <label for="email">Email</label>
            <input type="email" name=email>
        </div>
        <div class="form-input-group">
            <label for="username">Username</label>
            <input type="text" name=username>
        </div>
        <div class="form-input-group">
            <label for="password">Password</label>
            <input type="password" name=password>
        </div>
        <div class="form-input-group">
            <label for="role">Role</label>
            <select name="role" id="">
                <option value="Admin">Admin</option><option value="Visa Officer">Visa Officer</option><option value="Supervisor">Supervisor</option><option value="Manager">Manager</option>            </select>
        </div>

        <input type="submit" class="btn btn-next">
    </form>
<?= $this->endSection() ?>