<!DOCTYPE html>
<html>

<head>
    <title>Add Patient to Queue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Add Patient to Queue</h2>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <div class="card">
            <div class="card-body">
                <form method="post" action="<?php echo site_url('queue/create'); ?>">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add to Queue</button>
                    <a href="<?php echo site_url('queue'); ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>