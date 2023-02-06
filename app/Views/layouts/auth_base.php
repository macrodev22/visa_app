<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uganda Visa : Staff Login</title>
    <link rel="stylesheet" href="/static/vendors/css/all.min.css">
    <link rel="stylesheet" href="/static/vendors/css/bootstrap.min.css">
    <script src="/static/vendors/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/styles/visa.css">
</head>
<body>
    <header>
    <div class="login-section d-flex">
        <a class="btn btn-secondary" href="/">Home</a>
        <a class="btn btn-secondary" href="/login/manager/">Manager Login</a>
        <a class="btn btn-tertiary" href="/login/admin/">Admin Login</a>
        <a class="btn" href="/checkapplication">Applicant Login</a>
    </div>
    </header>
    
    <?= $this->renderSection('content') ?>

</body>
</html>