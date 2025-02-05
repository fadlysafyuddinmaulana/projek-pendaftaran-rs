<!DOCTYPE html>
<html>

<head>
    <title>Queue Display Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .queue-board {
            background: #000;
            color: #fff;
            padding: 20px;
        }

        .current-number {
            font-size: 48px;
            font-weight: bold;
        }

        .waiting-list {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="queue-board">
        <div class="container">
            <h1 class="text-center mb-4">Current Queue Status</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-primary text-white">
                        <div class="card-header">
                            <h3>Now Serving</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            $in_progress = array_filter($current_queue, function ($q) {
                                return $q->status == 'in_progress';
                            });
                            if ($in_progress):
                                $current = reset($in_progress);
                            ?>
                                <div class="current-number"><?php echo $current->queue_number; ?></div>
                            <?php else: ?>
                                <div class="current-number">--</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card bg-info text-white">
                        <div class="card-header">
                            <h3>Waiting List</h3>
                        </div>
                        <div class="card-body">
                            <div class="waiting-list">
                                <?php
                                $waiting = array_filter($current_queue, function ($q) {
                                    return $q->status == 'waiting';
                                });
                                foreach ($waiting as $queue):
                                ?>
                                    <div><?php echo $queue->queue_number; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Auto refresh every 30 seconds
        setInterval(function() {
            location.reload();
        }, 30000);
    </script>
</body>

</html>