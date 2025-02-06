<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barcode_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        // Ensure the barcodes directory exists
        $upload_path = './uploads/barcodes/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
    }

    /**
     * Generate barcode image
     * 
     * @param string $data Data to encode in barcode
     * @return string Path to generated barcode image
     */
    public function generate($data)
    {
        // Create a unique filename
        $filename = 'barcode_' . md5($data . time()) . '.png';
        $filepath = './uploads/barcodes/' . $filename;

        // Check if GD library is available
        if (extension_loaded('gd') && function_exists('imagecreate')) {
            $this->create_barcode_gd($data, $filepath);
        } else {
            // Fallback to text-based barcode
            $this->create_text_barcode($data, $filepath);
        }

        return 'uploads/barcodes/' . $filename;
    }

    /**
     * Create barcode image using GD library
     * 
     * @param string $data Data to encode
     * @param string $filepath Path to save barcode image
     */
    private function create_barcode_gd($data, $filepath)
    {
        try {
            // Image dimensions
            $width = 350;
            $height = 100;

            // Create image
            $image = imagecreate($width, $height);

            // Allocate colors
            $white = imagecolorallocate($image, 255, 255, 255);
            $black = imagecolorallocate($image, 0, 0, 0);

            // Fill background
            imagefill($image, 0, 0, $white);

            // Bar properties
            $thick = 3;
            $thin = 1;
            $gap = 2;

            // Starting position
            $x = 10;

            // Simple barcode generation
            for ($i = 0; $i < strlen($data); $i++) {
                // Alternate between thick and thin bars
                $bar_width = ($i % 2 == 0) ? $thick : $thin;

                // Draw bar
                imagefilledrectangle(
                    $image,
                    $x,
                    0,
                    $x + $bar_width,
                    $height,
                    $black
                );

                // Move to next position
                $x += $bar_width + $gap;
            }

            // Save image
            imagepng($image, $filepath);

            // Free memory
            imagedestroy($image);
        } catch (Exception $e) {
            // If GD fails, use text-based fallback
            $this->create_text_barcode($data, $filepath);
        }
    }

    /**
     * Create text-based barcode as fallback
     * 
     * @param string $data Data to encode
     * @param string $filepath Path to save barcode file
     */
    private function create_text_barcode($data, $filepath)
    {
        // Create a simple text-based "barcode"
        $content = "BARCODE: " . $data;

        // Write to file
        file_put_contents($filepath, $content);
    }

    /**
     * Check if GD library is available
     * 
     * @return bool
     */
    public function is_gd_available()
    {
        return extension_loaded('gd') && function_exists('imagecreate');
    }
}
