<!DOCTYPE html>
<html>

<head>
    <title>Archived Registrations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Archived Registrations</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Patient Number</th>
                            <th>Name</th>
                            <th>Registration Date</th>
                            <th>Archive Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($archived_patients as $patient): ?>
                            <tr>
                                <td><?php echo $patient->patient_number; ?></td>
                                <td><?php echo $patient->full_name; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($patient->created_at)); ?></td>
                                <td><?php echo date('Y-m-d H:i:s', strtotime($patient->archived_at)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a href="<?php echo site_url('reset'); ?>" class="btn btn-secondary">
                    Back to Reset Page
                </a>
            </div>
        </div>
    </div>
</body>

</html>