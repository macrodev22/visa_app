<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DashBoard</title>
    <link rel="stylesheet" href="/static/vendors/fonts/css/all.css" />
    <!-- <link rel="stylesheet" href="vendor/css/all.css"> -->
    <link rel="stylesheet" href="/styles/dashboard.css" />
  </head>
  <body>
    <nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="/assets/images/logo-social.png" alt="" />
        </div>
        <span class="logo-name-text">OnPoint Visa</span>
      </div>

      <div class="menu-items">
        <ul class="nav-link">
          <li>
            <a href="/user/staff/" data-base="true">
              <i class="fa-solid fa-house"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          <?php
          if(session()->get('role') == 'Admin'): ?>
          <li>
            <a href="/api/users/">
              <i class="fa-solid fa-users"></i>
              <span class="link-name">Users</span>
            </a>
          </li> 
          <?php endif
          ?>
          <li>
            <a href="/user/staff/" data-base="true">
              <i class="fa-regular fa-file-lines"></i>
              <span class="link-name">Applications</span>
            </a>
          </li>
          <li>
            <a href="/api/visas/">
              <i class="fa-solid fa-passport"></i>
              <span class="link-name">Visa Types</span>
            </a>
          </li>
          <li>
            <a href="/api/requirements/">
              <i class="fa-solid fa-book"></i>
              <span class="link-name">Requirements</span>
            </a>
          </li>
        </ul>

        <ul class="logout-mod">
          <li>
            <a href="/logout">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <span class="link-name">Logout</span>
            </a>
          </li>
          <li class="mode">
            <a href="#">
              <i class="fa-regular fa-moon link-name"></i>
              <span class="link-name">Theme</span>
            </a>
            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <section class="dashboard">
      <div class="top">
        <div class="sidebar-toggle">
          <i class="fa-solid fa-bars"></i>
        </div>
        <div class="search-box">
          <i class="fa-brands fa-searchengin"></i>
          <input type="text" placeholder="Search..." />
        </div>

        <img src="/assets/images/user-profile.webp" alt="user" />
        <div class="user-info display-none">
          <p><?= $first_name ?> <?= $last_name ?></p>
          <p><?= $username ?></p>
          <p><?= $role ?></p>
          <a href="/logout/">
            <p>Logout</p>
          </a>
        </div>
      </div>

    <?= $this->renderSection('dash-content') ?>

      </section>

<script src="/script/dashboard.js"></script>
</body>
</html>
