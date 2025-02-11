<?php if ($file_footer == 1) { ?>
    <div class="footer">
        &copy; 2025 Rumah Sakit Islam Indonesia. Semua hak dilindungi.
    </div>
<?php } else { ?>
    <div class="footer-a">
        &copy; 2025 Rumah Sakit Islam Indonesia. Semua hak dilindungi.
    </div>
<?php } ?>
<script src="<?= base_url() ?>assets/web-pendaftaran-rs-online/pages/script.js"></script>
<script>
    $(document).ready(function() {
        let currentStep = 0;
        const steps = $(".step");

        function showStep(index) {
            if (index >= 0 && index < steps.length) {
                steps.removeClass("active");
                $(steps[index]).addClass("active");
            }
        }

        $(".next").click(function() {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });

        $(".prev").click(function() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });

        $(".btn-back").click(function() {
            window.location.href = "index.html";
        });

        showStep(currentStep);
    });
</script>
</body>

</html>