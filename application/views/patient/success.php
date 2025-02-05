<!DOCTYPE html>
<html>

<head>
    <title>Registration Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title">Registration Successful!</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h4>Your Queue Number</h4>
                            <div class="display-1 fw-bold text-success mb-3">
                                <?php echo $result['queue_number']; ?>
                            </div>
                            <p class="lead">Please keep this number and wait for your turn.</p>
                        </div>

                        <div class="alert alert-info">
                            <strong>Patient ID:</strong> <?php echo $result['patient_number']; ?><br>
                            <small>Please save this number for future visits</small>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="<?php echo site_url('queue/display_board'); ?>"
                                class="btn btn-primary" target="_blank">
                                View Queue Status
                            </a>
                            <a href="<?php echo site_url('patient/register'); ?>"
                                class="btn btn-secondary">
                                Register Another Patient
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Queue Ticket -->
    <div class="d-none">
        <div id="ticket-print">
            <div style="width: 300px; padding: 20px; text-align: center;">
                <h3>Queue Ticket</h3>
                <h1 style="font-size: 48px;"><?php echo $result['queue_number']; ?></h1>
                <p>Patient ID: <?php echo $result['patient_number']; ?></p>
                <p>Date: <?php echo date('d/m/Y H:i'); ?></p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Automatically print the ticket
            window.print();
        });
    </script>
</body>

</html>