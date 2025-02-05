<!DOCTYPE html>
<html>

<head>
    <title>Queue Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Queue Management</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <a href="<?php echo site_url('queue/add'); ?>" class="btn btn-primary mb-3">Add New Patient</a>

        <div class="card">
            <div class="card-header">
                Current Queue
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Queue Number</th>
                            <th>Patient Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($current_queue as $queue): ?>
                            <tr>
                                <td><?php echo $queue->queue_number; ?></td>
                                <td><?php echo $queue->full_name; ?></td>
                                <td><?php echo ucfirst($queue->status); ?></td>
                                <td>
                                    <?php if ($queue->status == 'waiting'): ?>
                                        <button class="btn btn-sm btn-primary call-patient"
                                            data-queue-id="<?php echo $queue->id; ?>">
                                            Call
                                        </button>
                                    <?php elseif ($queue->status == 'in_progress'): ?>
                                        <button class="btn btn-sm btn-success complete-patient"
                                            data-queue-id="<?php echo $queue->id; ?>">
                                            Complete
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.call-patient').click(function() {
                updateStatus($(this).data('queue-id'), 'in_progress');
            });

            $('.complete-patient').click(function() {
                updateStatus($(this).data('queue-id'), 'completed');
            });

            function updateStatus(queueId, status) {
                $.post('<?php echo site_url("queue/update_status"); ?>', {
                    queue_id: queueId,
                    status: status
                }, function(response) {
                    if (response.success) {
                        location.reload();
                    }
                });
            }
        });
    </script>
</body>

</html>