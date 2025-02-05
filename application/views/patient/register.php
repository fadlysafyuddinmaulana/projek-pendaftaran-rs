<!DOCTYPE html>
<html>

<head>
    <title>Patient Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Patient Registration</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo form_open('patient/verify', ['class' => 'needs-validation']); ?>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK (National ID)*</label>
                            <input type="text" class="form-control <?php echo form_error('nik') ? 'is-invalid' : ''; ?>"
                                id="nik" name="nik" value="<?php echo set_value('nik'); ?>">
                            <?php echo form_error('nik', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name*</label>
                            <input type="text" class="form-control <?php echo form_error('full_name') ? 'is-invalid' : ''; ?>"
                                id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>">
                            <?php echo form_error('full_name', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth*</label>
                            <input type="date" class="form-control <?php echo form_error('date_of_birth') ? 'is-invalid' : ''; ?>"
                                id="date_of_birth" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>">
                            <?php echo form_error('date_of_birth', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender*</label>
                            <select class="form-select <?php echo form_error('gender') ? 'is-invalid' : ''; ?>"
                                id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="M" <?php echo set_select('gender', 'M'); ?>>Male</option>
                                <option value="F" <?php echo set_select('gender', 'F'); ?>>Female</option>
                            </select>
                            <?php echo form_error('gender', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address*</label>
                            <textarea class="form-control <?php echo form_error('address') ? 'is-invalid' : ''; ?>"
                                id="address" name="address" rows="3"><?php echo set_value('address'); ?></textarea>
                            <?php echo form_error('address', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number*</label>
                            <input type="text" class="form-control <?php echo form_error('phone_number') ? 'is-invalid' : ''; ?>"
                                id="phone_number" name="phone_number" value="<?php echo set_value('phone_number'); ?>">
                            <?php echo form_error('phone_number', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>"
                                id="email" name="email" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Register & Get Queue Number</button>
                            <a href="<?php echo site_url('queue'); ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>