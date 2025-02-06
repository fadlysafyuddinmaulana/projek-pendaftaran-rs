<!DOCTYPE html>
<html>

<head>
    <title>Queue Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h2>Queue Management</h2>

        <div class="card">
            <div class="card-header">Current Queue</div>
            <div class="card-body">
                <table class="table" id="queueTable">
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
                                <td><?php echo $queue->nama_pasien; ?></td>
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
            // Pusher Configuration
            Pusher.logToConsole = true;
            var pusher = new Pusher('016c08442b56088089f8', {
                cluster: 'ap1',
                forceTLS: true
            });

            // Subscribe to channel
            var channel = pusher.subscribe('rsi_kp');

            // Handle new patient event
            channel.bind('my-event', function(data) {
                if (data.message === 'success') {
                    // Reload or update queue table
                    location.reload();
                }
            });

            // Patient status update functions
            // $(document).on('click', '.call-patient', function() {
            //     updateStatus($(this).data('queue-id'), 'in_progress');
            // });

            // $(document).on('click', '.complete-patient', function() {
            //     updateStatus($(this).data('queue-id'), 'completed');
            // });

            // function updateStatus(queueId, status) {
            //     $.post('<?php echo site_url("queue/update_status"); ?>', {
            //         queue_id: queueId,
            //         status: status
            //     }, function(response) {
            //         if (response.success) {
            //             location.reload();
            //         }
            //     });
            // }
        });
    </script>
</body>

</html>