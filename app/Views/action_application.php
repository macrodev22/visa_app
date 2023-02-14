<?= $this->extend('layouts/dashboard_base') ?>

<?= $this->section('dash-content') ?>
<div class="dash-content">

    <div class="overview">
    
        <h1>Application Review</h1>
        <div class="passport-photo" style="display:flex">
            <img src="<?= $applicant['photo_path'] ?>" alt="" style="width:150px">
            <div>
                <a href="" class="btn btn-success" id="approve-btn" data-application="<?= $applicant['application_id']?>">Approve</a>
                <a href="" class="btn btn-warn" id="reject-btn" data-application="<?= $applicant['application_id']?>">Reject</a>
            </div>
        </div>
        <div class="attachments">
            <a href="<?= $applicant['passport_path'] ?>" target="_blank" class="btn">Passport</a>

            <?php
                foreach($other_attachments as $attachment)
                {
                    echo  <<<EOT
                    <a href="{$attachment['attachment_path']}" target="_blank" class="btn">{$attachment['name']}</a>
                    EOT;
                }
            ?>

        </div>
        <div class="application-info">
            <table>
                <thead>
                    <tr>
                        <th>Visa</th>
                        <th>Fullname</th>
                        <th>Nationality</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Passport #</th>
                        <th>Passport expiry</th>
                        <th>Arrival Date</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $visa_type ?></td>
                        <td><?= $applicant['first_name'] ?> <?= $applicant['middle_name'] ?> <?= $applicant['surname'] ?></td>
                        <td><?= $applicant['nationality'] ?></td>
                        <td><?= $applicant['date_of_birth'] ?></td>
                        <td><?= strtoupper($applicant['gender'] )?></td>
                        <td><?= $applicant['passport_number'] ?></td>
                        <td><?= $applicant['passport_expiry'] ?></td>
                        <td><?= $application['date_of_arrival'] ?></td>
                        <td><?= $applicant['father_name'] ?></td>
                        <td><?= $applicant['mother_name'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
<?= $this->endSection() ?>