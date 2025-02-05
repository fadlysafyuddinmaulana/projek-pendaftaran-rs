<!DOCTYPE html>
<html>

<head>
    <title>Reset Registration Numbers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title">Reset Registration Numbers</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="alert alert-warning">
                            <h4 class="alert-heading">Warning!</h4>
                            <p>This action will:</p>
                            <ul>
                                <li>Move all current registrations to archive</li>
                                <li>Reset patient registration numbers to start from 1</li>
                                <li>Reset queue numbers to start from A001</li>
                            </ul>
                            <p>This action cannot be undone. Archived data can be viewed but not restored automatically.</p>
                        </div>

                        <?php echo form_open('reset/confirm'); ?>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="confirm_reset" name="confirm_reset" value="1" required>
                            <label class="form-check-label" for="confirm_reset">
                                I understand that this action cannot be undone
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger">
                                Reset All Numbers
                            </button>
                            <a href="<?php echo site_url('reset/view_archive'); ?>" class="btn btn-secondary">
                                View Archive
                            </a>
                            <a href="<?php echo site_url('queue'); ?>" class="btn btn-link">
                                Back to Queue Management
                            </a>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>