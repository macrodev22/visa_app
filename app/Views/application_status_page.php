<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>On Point Visa</title>
    <link rel="stylesheet" href="/styles\visa.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="container d-flex jc-sb">
        <img
          src="/assets\images\visa-img\dcic_logo.png"
          class="nav-logo"
          alt=""
        />
      </div>
    </nav>
    <div class="container">
      <h3 id="application-status">APPLICATION STATUS: <span><?= $status ?></span></h3> <!-- Status -->
      <p>
        Your application <?php if($status !== 'Processing'):?>has been <?php else: ?> is <?php endif ?> <?= $status ?>. You can download your notice here
      </p>

      <h4>Application ID</h4>
      <hr />
      <div class="application-info">
        <p><?= $application_id ?></p> 
        <p><?= strtoupper($first_name) ?> <?= strtoupper($middle_name) ?> <?= strtoupper($last_name) ?></p>
      </div>
      <hr />
      <div class="comments-appl">
        <p>Comments about your application</p>
        <p>
          Dear <?= strtoupper($first_name) ?> <?= strtoupper($middle_name) ?> <?= strtoupper($last_name) ?>, your application for 30 day/s permit is <?= $status ?>    </p>
      </div>
      <hr />
      <div class="row view-application-bottom">
        <a href="/applications/viewpdf/?id=<?= $application_id ?>&applicant=5&action=download" class="btn">Download PDF</a
        ><a href="/applications/viewpdf/?id=<?= $application_id ?>&applicant=5&action=view" class="btn">View</a>
        <a href="/logout/" class="btn btn-tertiary">Back</a>
      </div>
      <div class="clearfix"></div>
    </div>
  </body>
</html>