<?= $this->extend('layouts/dashboard_base') ?>

<?= $this->section('dash-content') ?>

<div class="dash-content">
        <div class="overview">
          <div class="title">
            <i class="fa-solid fa-gauge-high"></i>
            <span class="text">Dashboard</span>
          </div>

          <div class="boxes">
            <div class="box box1">
              <i class="fa-solid fa-person-digging"></i>
              <span class="text">Total in process</span>
              <span class="number"><?= $num_processing ?></span>
            </div>
            <div class="box box2">
              <i class="fa-solid fa-chart-pie"></i>
              <span class="text">Total applications</span>
              <span class="number"><?= $num_applications ?></span>
            </div>
            <div class="box box3">
              <i class="fa-regular fa-circle-check"></i>
              <span class="text">Total approved</span>
              <span class="number"><?= $num_approved ?></span>
            </div>
          </div>
        </div>
        <div class="activity">
          <div class="title">
            <i class="fa-solid fa-list-check"></i>
            <span class="text">Applications</span>
          </div>
          <div class="activity-data">
            <table class="activity-data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Gender</th>
                  <th>Marital Status</th>
                  <th>Date of Birth</th>
                  <th>Nationality</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Date Applied</th>
                </tr>
              </thead>
              <tbody>
                <?php helper('retrieve_helper') ?>
                <?php foreach($applications->getResultArray() as $row): ?>
                <tr onclick="window.open('/applications/<?= $row['id'] ?>', '_blank')">
                  <td><?= $row['application_id'] ?></td>
                  <td><?= $row['first_name'] ?> <?= $row['surname'] ?></td>
                  <td><?= strtoupper($row['gender']) ?></td>
                  <td><?= $row['marital_status'] ?></td>
                  <td><?= $row['date_of_birth'] ?></td>
                  <td><?= $row['nationality'] ?></td>
                  <td><?= getVisaTypeName($row['visa_type']) ?></td>
                  <td><span class="status <?= strtolower($row['status']) ?>"><?= $row['status'] ?></span></td>
                  <td><?= $row['date_created'] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<?= $this->endSection() ?>