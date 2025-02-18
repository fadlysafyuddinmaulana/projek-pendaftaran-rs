// Function to print only the specified content
function printPatientCard() {
    // Store the original page content
    const originalContent = document.body.innerHTML;
    
    // Get only the content we want to print
    const printContent = `
        <div class="print-section">
            <div class="qrcode" id="qrcode">
                ${document.getElementById('qrcode').innerHTML}
            </div>
            <div class="queue-number">
                <h2>Nomor Urut Pasien:</h2>
                <div class="number">${document.querySelector('.number').innerHTML}</div>
            </div>
            <div class="alert">
                <b>SIMPAN NOMOR PASIEN UNTUK LOGIN</b>
                <div class="p">
                    ${document.querySelector('.alert .p').innerHTML}
                </div>
            </div>
        </div>
    `;
    
    // Replace body content with print content
    document.body.innerHTML = printContent;
    
    // Print the page
    window.print();
    
    // Restore original content
    document.body.innerHTML = originalContent;
    
    // Reattach event listeners if needed
    attachEventListeners();
}

// Add print styles
const style = document.createElement('style');
style.textContent = `
    @media print {
        body * {
            visibility: hidden;
        }
        .print-section, .print-section * {
            visibility: visible;
        }
        .print-section {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
`;
document.head.appendChild(style);

// Replace your original link with this:
// <a href="#" onclick="printPatientCard(); return false;" class="btn-export print">
//     <i class="fas fa-print"></i> Cetak Langsung
// </a>