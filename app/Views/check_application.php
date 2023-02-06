<?= $this->extend('layouts/auth_base') ?>

<?= $this->section('content') ?>

<h1>Check Application / Applicant Login</h1>

<form action="" class="form" method="POST">
    <div class="form-input-group">
        <label for="email">email</label>
        <input type="email" name="email">
    </div>

    <div class="form-input-group">
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>
    <p>OR</p>
    <div class="form-input-group">
        <label for="app-id">Application Ref</label>
        <input type="text" name="app-id">
    </div>

    <div class="form-input-group">
        <label for="surname">Surname</label>
        <input type="text" name="surname">
    </div>

    <div class="form-input-group">
        <label for="d-o-b">Date of Birth</label>
        <input type="date" name="d-o-b">
    </div>

    <div class="form-input-group d-flex">
        <a href="/" class="btn btn-prev btn-secondary">Back</a>
        <input type="submit" class="btn btn-next" value="Check">
    </div>
</form>

<?= $this->endSection() ?>