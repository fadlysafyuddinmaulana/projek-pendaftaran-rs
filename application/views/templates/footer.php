<div class="footer">
    &copy; 2025 Rumah Sakit Islam Indonesia. Semua hak dilindungi.
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>assets/web-pendaftaran-rs-online/pages/script.js"></script>
<script src="<?= base_url() ?>assets/js/patient_print.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        function showTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));

            const tabElement = document.getElementById(tabId);
            const buttonElement = document.querySelector(`button[onclick="showTab('${tabId}')"]`);

            if (tabElement) tabElement.classList.add('active');
            if (buttonElement) buttonElement.classList.add('active');
        }

        window.showTab = showTab; // Make the function globally accessible

        let activeTab = 'login';

        // Auto-switch to the Register tab if PHP sets the $active_tab variable
        <?php if (!empty($active_tab)) { ?>
            showTab('<?= $active_tab ?>');
        <?php } ?>
    });
</script>

<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


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

        showStep(currentStep);
    });
</script>

<script>
    $(document).ready(function() {
        $('#province, #city, #kabupaten').select2();
    });

    function updateCitiesAndKabupaten() {
        const province = $("#provinsi").val();
        const citySelect = $("#kota");
        const kabupatenSelect = $("#kabupaten");
        citySelect.empty().append("<option value=''>Pilih Kota</option>");
        kabupatenSelect.empty().append("<option value=''>Pilih Kabupaten</option>");

        const data = {
            sumatera_utara: {
                cities: [{
                        value: "medan",
                        text: "Kota Medan"
                    },
                    {
                        value: "binjai",
                        text: "Kota Binjai"
                    },
                    {
                        value: "gunungsitoli",
                        text: "Kota Gunungsitoli"
                    },
                    {
                        value: "padangsidempuan",
                        text: "Kota Padangsidempuan"
                    },
                    {
                        value: "pematangsiantar",
                        text: "Kota Pematangsiantar"
                    },
                    {
                        value: "sibolga",
                        text: "Kota Sibolga"
                    },
                    {
                        value: "tanjungbalai",
                        text: "Kota Tanjungbalai"
                    },
                    {
                        value: "tebing_tinggi",
                        text: "Kota Tebing Tinggi"
                    }
                ],
                kabupaten: [{
                        value: "nias",
                        text: "Kabupaten Nias"
                    },
                    {
                        value: "deli_serdang",
                        text: "Kabupaten Deli Serdang"
                    },
                    {
                        value: "simalungun",
                        text: "Kabupaten Simalungun"
                    },
                    {
                        value: "asahan",
                        text: "Kabupaten Asahan"
                    },
                    {
                        value: "batu_bara",
                        text: "Kabupaten Batu Bara"
                    },
                    {
                        value: "dairi",
                        text: "Kabupaten Dairi"
                    },
                    {
                        value: "humbang_hasundutan",
                        text: "Kabupaten Humbang Hasundutan"
                    },
                    {
                        value: "karo",
                        text: "Kabupaten Karo"
                    },
                    {
                        value: "labuhanbatu",
                        text: "Kabupaten Labuhanbatu"
                    },
                    {
                        value: "labuhanbatu_selatan",
                        text: "Kabupaten Labuhanbatu Selatan"
                    },
                    {
                        value: "labuhanbatu_utara",
                        text: "Kabupaten Labuhanbatu Utara"
                    },
                    {
                        value: "langkat",
                        text: "Kabupaten Langkat"
                    },
                    {
                        value: "mandailing_natal",
                        text: "Kabupaten Mandailing Natal"
                    },
                    {
                        value: "nias_barat",
                        text: "Kabupaten Nias Barat"
                    },
                    {
                        value: "nias_selatan",
                        text: "Kabupaten Nias Selatan"
                    },
                    {
                        value: "nias_utara",
                        text: "Kabupaten Nias Utara"
                    },
                    {
                        value: "padang_lawas",
                        text: "Kabupaten Padang Lawas"
                    },
                    {
                        value: "padang_lawas_utara",
                        text: "Kabupaten Padang Lawas Utara"
                    },
                    {
                        value: "pakpak_bharat",
                        text: "Kabupaten Pakpak Bharat"
                    },
                    {
                        value: "samosir",
                        text: "Kabupaten Samosir"
                    },
                    {
                        value: "serdang_bedagai",
                        text: "Kabupaten Serdang Bedagai"
                    },
                    {
                        value: "tapanuli_selatan",
                        text: "Kabupaten Tapanuli Selatan"
                    },
                    {
                        value: "tapanuli_tengah",
                        text: "Kabupaten Tapanuli Tengah"
                    },
                    {
                        value: "tapanuli_utara",
                        text: "Kabupaten Tapanuli Utara"
                    },
                    {
                        value: "toba",
                        text: "Kabupaten Toba"
                    }
                ]
            },
            aceh: {
                cities: [{
                        value: "banda_aceh",
                        text: "Kota Banda Aceh"
                    },
                    {
                        value: "langsa",
                        text: "Kota Langsa"
                    },
                    {
                        value: "lhokseumawe",
                        text: "Kota Lhokseumawe"
                    },
                    {
                        value: "sabang",
                        text: "Kota Sabang"
                    },
                    {
                        value: "subulussalam",
                        text: "Kota Subulussalam"
                    }
                ],
                kabupaten: [{
                        value: "aceh_barat",
                        text: "Kabupaten Aceh Barat"
                    },
                    {
                        value: "aceh_besar",
                        text: "Kabupaten Aceh Besar"
                    },
                    {
                        value: "aceh_jaya",
                        text: "Kabupaten Aceh Jaya"
                    },
                    {
                        value: "aceh_selatan",
                        text: "Kabupaten Aceh Selatan"
                    },
                    {
                        value: "aceh_singkil",
                        text: "Kabupaten Aceh Singkil"
                    },
                    {
                        value: "aceh_tamiang",
                        text: "Kabupaten Aceh Tamiang"
                    },
                    {
                        value: "aceh_tengah",
                        text: "Kabupaten Aceh Tengah"
                    },
                    {
                        value: "aceh_tenggara",
                        text: "Kabupaten Aceh Tenggara"
                    },
                    {
                        value: "aceh_timur",
                        text: "Kabupaten Aceh Timur"
                    },
                    {
                        value: "aceh_utara",
                        text: "Kabupaten Aceh Utara"
                    },
                    {
                        value: "bener_meriah",
                        text: "Kabupaten Bener Meriah"
                    },
                    {
                        value: "bireuen",
                        text: "Kabupaten Bireuen"
                    },
                    {
                        value: "gayo_lues",
                        text: "Kabupaten Gayo Lues"
                    },
                    {
                        value: "nagan_raya",
                        text: "Kabupaten Nagan Raya"
                    },
                    {
                        value: "pidie",
                        text: "Kabupaten Pidie"
                    },
                    {
                        value: "pidie_jaya",
                        text: "Kabupaten Pidie Jaya"
                    },
                    {
                        value: "simeulue",
                        text: "Kabupaten Simeulue"
                    },
                    {
                        value: "aceh_barat_daya",
                        text: "Kabupaten Aceh Barat Daya"
                    }
                ]
            },
            sumatera_barat: {
                cities: [{
                        value: "padang",
                        text: "Kota Padang"
                    },
                    {
                        value: "bukittinggi",
                        text: "Kota Bukittinggi"
                    },
                    {
                        value: "padang_panjang",
                        text: "Kota Padang Panjang"
                    },
                    {
                        value: "pariaman",
                        text: "Kota Pariaman"
                    },
                    {
                        value: "payakumbuh",
                        text: "Kota Payakumbuh"
                    },
                    {
                        value: "sawahlunto",
                        text: "Kota Sawahlunto"
                    },
                    {
                        value: "solok",
                        text: "Kota Solok"
                    }
                ],
                kabupaten: [{
                        value: "agam",
                        text: "Kabupaten Agam"
                    },
                    {
                        value: "dharmasraya",
                        text: "Kabupaten Dharmasraya"
                    },
                    {
                        value: "kepulauan_mentawai",
                        text: "Kabupaten Kepulauan Mentawai"
                    },
                    {
                        value: "lima_puluh_kota",
                        text: "Kabupaten Lima Puluh Kota"
                    },
                    {
                        value: "padang_pariaman",
                        text: "Kabupaten Padang Pariaman"
                    },
                    {
                        value: "pasaman",
                        text: "Kabupaten Pasaman"
                    },
                    {
                        value: "pasaman_barat",
                        text: "Kabupaten Pasaman Barat"
                    },
                    {
                        value: "pesisir_selatan",
                        text: "Kabupaten Pesisir Selatan"
                    },
                    {
                        value: "sijunjung",
                        text: "Kabupaten Sijunjung"
                    },
                    {
                        value: "solok",
                        text: "Kabupaten Solok"
                    },
                    {
                        value: "solok_selatan",
                        text: "Kabupaten Solok Selatan"
                    },
                    {
                        value: "tanah_datar",
                        text: "Kabupaten Tanah Datar"
                    }
                ]
            },
            riau: {
                cities: [{
                        value: "dumai",
                        text: "Kota Dumai"
                    },
                    {
                        value: "pekanbaru",
                        text: "Kota Pekanbaru"
                    }
                ],
                kabupaten: [{
                        value: "bengkalis",
                        text: "Kabupaten Bengkalis"
                    },
                    {
                        value: "indragiri_hilir",
                        text: "Kabupaten Indragiri Hilir"
                    },
                    {
                        value: "indragiri_hulu",
                        text: "Kabupaten Indragiri Hulu"
                    },
                    {
                        value: "kampar",
                        text: "Kabupaten Kampar"
                    },
                    {
                        value: "kuantan_singingi",
                        text: "Kabupaten Kuantan Singingi"
                    },
                    {
                        value: "pelalawan",
                        text: "Kabupaten Pelalawan"
                    },
                    {
                        value: "rokan_hilir",
                        text: "Kabupaten Rokan Hilir"
                    },
                    {
                        value: "rokan_hulu",
                        text: "Kabupaten Rokan Hulu"
                    },
                    {
                        value: "siak",
                        text: "Kabupaten Siak"
                    }
                ]
            },
            kepulauan_riau: {
                cities: [{
                        value: "batam",
                        text: "Kota Batam"
                    },
                    {
                        value: "tanjungpinang",
                        text: "Kota Tanjungpinang"
                    }
                ],
                kabupaten: [{
                        value: "bintan",
                        text: "Kabupaten Bintan"
                    },
                    {
                        value: "karimun",
                        text: "Kabupaten Karimun"
                    },
                    {
                        value: "kepulauan_anambas",
                        text: "Kabupaten Kepulauan Anambas"
                    },
                    {
                        value: "lingga",
                        text: "Kabupaten Lingga"
                    },
                    {
                        value: "natuna",
                        text: "Kabupaten Natuna"
                    }
                ]
            },
            jambi: {
                cities: [{
                        value: "jambi",
                        text: "Kota Jambi"
                    },
                    {
                        value: "sungai_penuh",
                        text: "Kota Sungai Penuh"
                    }
                ],
                kabupaten: [{
                        value: "batanghari",
                        text: "Kabupaten Batanghari"
                    },
                    {
                        value: "bungo",
                        text: "Kabupaten Bungo"
                    },
                    {
                        value: "kerinci",
                        text: "Kabupaten Kerinci"
                    },
                    {
                        value: "merangin",
                        text: "Kabupaten Merangin"
                    },
                    {
                        value: "muaro_jambi",
                        text: "Kabupaten Muaro Jambi"
                    },
                    {
                        value: "sarolangun",
                        text: "Kabupaten Sarolangun"
                    },
                    {
                        value: "tanjung_jabung_barat",
                        text: "Kabupaten Tanjung Jabung Barat"
                    },
                    {
                        value: "tanjung_jabung_timur",
                        text: "Kabupaten Tanjung Jabung Timur"
                    },
                    {
                        value: "tebo",
                        text: "Kabupaten Tebo"
                    }
                ]
            },
            sumatera_selatan: {
                cities: [{
                        value: "lubuklinggau",
                        text: "Kota Lubuklinggau"
                    },
                    {
                        value: "pagar_alam",
                        text: "Kota Pagar Alam"
                    },
                    {
                        value: "palembang",
                        text: "Kota Palembang"
                    },
                    {
                        value: "prabumulih",
                        text: "Kota Prabumulih"
                    }
                ],
                kabupaten: [{
                        value: "banyuasin",
                        text: "Kabupaten Banyuasin"
                    },
                    {
                        value: "empat_lawang",
                        text: "Kabupaten Empat Lawang"
                    },
                    {
                        value: "lahat",
                        text: "Kabupaten Lahat"
                    },
                    {
                        value: "muara_enim",
                        text: "Kabupaten Muara Enim"
                    },
                    {
                        value: "musi_banyuasin",
                        text: "Kabupaten Musi Banyuasin"
                    },
                    {
                        value: "musi_rawas",
                        text: "Kabupaten Musi Rawas"
                    },
                    {
                        value: "musi_rawas_utara",
                        text: "Kabupaten Musi Rawas Utara"
                    },
                    {
                        value: "ogan_ilir",
                        text: "Kabupaten Ogan Ilir"
                    },
                    {
                        value: "ogan_komering_ilir",
                        text: "Kabupaten Ogan Komering Ilir"
                    },
                    {
                        value: "ogan_komering_ulu",
                        text: "Kabupaten Ogan Komering Ulu"
                    },
                    {
                        value: "ogan_komering_ulu_selatan",
                        text: "Kabupaten Ogan Komering Ulu Selatan"
                    },
                    {
                        value: "ogan_komering_ulu_timur",
                        text: "Kabupaten Ogan Komering Ulu Timur"
                    },
                    {
                        value: "penukal_abab_lematang_ilir",
                        text: "Kabupaten Penukal Abab Lematang Ilir"
                    }
                ]
            },
            bengkulu: {
                cities: [{
                    value: "bengkulu",
                    text: "Kota Bengkulu"
                }],
                kabupaten: [{
                        value: "bengkulu_selatan",
                        text: "Kabupaten Bengkulu Selatan"
                    },
                    {
                        value: "bengkulu_tengah",
                        text: "Kabupaten Bengkulu Tengah"
                    },
                    {
                        value: "bengkulu_utara",
                        text: "Kabupaten Bengkulu Utara"
                    },
                    {
                        value: "kaur",
                        text: "Kabupaten Kaur"
                    },
                    {
                        value: "kepahiang",
                        text: "Kabupaten Kepahiang"
                    },
                    {
                        value: "lebong",
                        text: "Kabupaten Lebong"
                    },
                    {
                        value: "mukomuko",
                        text: "Kabupaten Mukomuko"
                    },
                    {
                        value: "rejang_lebong",
                        text: "Kabupaten Rejang Lebong"
                    },
                    {
                        value: "seluma",
                        text: "Kabupaten Seluma"
                    }
                ]
            },
            lampung: {
                cities: [{
                        value: "bandar_lampung",
                        text: "Kota Bandar Lampung"
                    },
                    {
                        value: "metro",
                        text: "Kota Metro"
                    }
                ],
                kabupaten: [{
                        value: "lampung_barat",
                        text: "Kabupaten Lampung Barat"
                    },
                    {
                        value: "lampung_selatan",
                        text: "Kabupaten Lampung Selatan"
                    },
                    {
                        value: "lampung_tengah",
                        text: "Kabupaten Lampung Tengah"
                    },
                    {
                        value: "lampung_timur",
                        text: "Kabupaten Lampung Timur"
                    },
                    {
                        value: "lampung_utara",
                        text: "Kabupaten Lampung Utara"
                    },
                    {
                        value: "mesuji",
                        text: "Kabupaten Mesuji"
                    },
                    {
                        value: "pesawaran",
                        text: "Kabupaten Pesawaran"
                    },
                    {
                        value: "pesisir_barat",
                        text: "Kabupaten Pesisir Barat"
                    },
                    {
                        value: "pringsewu",
                        text: "Kabupaten Pringsewu"
                    },
                    {
                        value: "tanggamus",
                        text: "Kabupaten Tanggamus"
                    },
                    {
                        value: "tulang_bawang",
                        text: "Kabupaten Tulang Bawang"
                    },
                    {
                        value: "tulang_bawang_barat",
                        text: "Kabupaten Tulang Bawang Barat"
                    },
                    {
                        value: "way_kanan",
                        text: "Kabupaten Way Kanan"
                    }
                ]
            },
            bangka_belitung: {
                cities: [{
                    value: "pangkalpinang",
                    text: "Kota Pangkalpinang"
                }],
                kabupaten: [{
                        value: "bangka",
                        text: "Kabupaten Bangka"
                    },
                    {
                        value: "bangka_barat",
                        text: "Kabupaten Bangka Barat"
                    },
                    {
                        value: "bangka_selatan",
                        text: "Kabupaten Bangka Selatan"
                    },
                    {
                        value: "bangka_tengah",
                        text: "Kabupaten Bangka Tengah"
                    },
                    {
                        value: "belitung",
                        text: "Kabupaten Belitung"
                    },
                    {
                        value: "belitung_timur",
                        text: "Kabupaten Belitung Timur"
                    }
                ]
            },
            banten: {
                cities: [{
                        value: "cilegon",
                        text: "Kota Cilegon"
                    },
                    {
                        value: "serang",
                        text: "Kota Serang"
                    },
                    {
                        value: "tangerang",
                        text: "Kota Tangerang"
                    },
                    {
                        value: "tangerang_selatan",
                        text: "Kota Tangerang Selatan"
                    }
                ],
                kabupaten: [{
                        value: "lebak",
                        text: "Kabupaten Lebak"
                    },
                    {
                        value: "pandeglang",
                        text: "Kabupaten Pandeglang"
                    },
                    {
                        value: "serang",
                        text: "Kabupaten Serang"
                    },
                    {
                        value: "tangerang",
                        text: "Kabupaten Tangerang"
                    }
                ]
            },
            dki_jakarta: {
                cities: [{
                        value: "jakarta_barat",
                        text: "Kota Administratif Jakarta Barat"
                    },
                    {
                        value: "jakarta_pusat",
                        text: "Kota Administratif Jakarta Pusat"
                    },
                    {
                        value: "jakarta_selatan",
                        text: "Kota Administratif Jakarta Selatan"
                    },
                    {
                        value: "jakarta_timur",
                        text: "Kota Administratif Jakarta Timur"
                    },
                    {
                        value: "jakarta_utara",
                        text: "Kota Administratif Jakarta Utara"
                    }
                ],
                kabupaten: [{
                    value: "kepulauan_seribu",
                    text: "Kabupaten Administratif Kepulauan Seribu"
                }]
            },
            jawa_barat: {
                cities: [{
                        value: "bandung",
                        text: "Kota Bandung"
                    },
                    {
                        value: "banjar",
                        text: "Kota Banjar"
                    },
                    {
                        value: "bekasi",
                        text: "Kota Bekasi"
                    },
                    {
                        value: "bogor",
                        text: "Kota Bogor"
                    },
                    {
                        value: "cimahi",
                        text: "Kota Cimahi"
                    },
                    {
                        value: "cirebon",
                        text: "Kota Cirebon"
                    },
                    {
                        value: "depok",
                        text: "Kota Depok"
                    },
                    {
                        value: "sukabumi",
                        text: "Kota Sukabumi"
                    },
                    {
                        value: "tasikmalaya",
                        text: "Kota Tasikmalaya"
                    }
                ],
                kabupaten: [{
                        value: "bandung",
                        text: "Kabupaten Bandung"
                    },
                    {
                        value: "bandung_barat",
                        text: "Kabupaten Bandung Barat"
                    },
                    {
                        value: "bekasi",
                        text: "Kabupaten Bekasi"
                    },
                    {
                        value: "bogor",
                        text: "Kabupaten Bogor"
                    },
                    {
                        value: "ciamis",
                        text: "Kabupaten Ciamis"
                    },
                    {
                        value: "cianjur",
                        text: "Kabupaten Cianjur"
                    },
                    {
                        value: "cirebon",
                        text: "Kabupaten Cirebon"
                    },
                    {
                        value: "garut",
                        text: "Kabupaten Garut"
                    },
                    {
                        value: "indramayu",
                        text: "Kabupaten Indramayu"
                    },
                    {
                        value: "karawang",
                        text: "Kabupaten Karawang"
                    },
                    {
                        value: "kuningan",
                        text: "Kabupaten Kuningan"
                    },
                    {
                        value: "majalengka",
                        text: "Kabupaten Majalengka"
                    },
                    {
                        value: "pangandaran",
                        text: "Kabupaten Pangandaran"
                    },
                    {
                        value: "purwakarta",
                        text: "Kabupaten Purwakarta"
                    },
                    {
                        value: "subang",
                        text: "Kabupaten Subang"
                    },
                    {
                        value: "sukabumi",
                        text: "Kabupaten Sukabumi"
                    },
                    {
                        value: "sumedang",
                        text: "Kabupaten Sumedang"
                    },
                    {
                        value: "tasikmalaya",
                        text: "Kabupaten Tasikmalaya"
                    }
                ]
            },
            jawa_tengah: {
                cities: [{
                        value: "magelang",
                        text: "Kota Magelang"
                    },
                    {
                        value: "pekalongan",
                        text: "Kota Pekalongan"
                    },
                    {
                        value: "salatiga",
                        text: "Kota Salatiga"
                    },
                    {
                        value: "semarang",
                        text: "Kota Semarang"
                    },
                    {
                        value: "surakarta",
                        text: "Kota Surakarta (Solo)"
                    },
                    {
                        value: "tegal",
                        text: "Kota Tegal"
                    }
                ],
                kabupaten: [{
                        value: "banjarnegara",
                        text: "Kabupaten Banjarnegara"
                    },
                    {
                        value: "banyumas",
                        text: "Kabupaten Banyumas"
                    },
                    {
                        value: "batang",
                        text: "Kabupaten Batang"
                    },
                    {
                        value: "blora",
                        text: "Kabupaten Blora"
                    },
                    {
                        value: "boyolali",
                        text: "Kabupaten Boyolali"
                    },
                    {
                        value: "brebes",
                        text: "Kabupaten Brebes"
                    },
                    {
                        value: "cilacap",
                        text: "Kabupaten Cilacap"
                    },
                    {
                        value: "demak",
                        text: "Kabupaten Demak"
                    },
                    {
                        value: "grobogan",
                        text: "Kabupaten Grobogan"
                    },
                    {
                        value: "jepara",
                        text: "Kabupaten Jepara"
                    },
                    {
                        value: "karanganyar",
                        text: "Kabupaten Karanganyar"
                    },
                    {
                        value: "kebumen",
                        text: "Kabupaten Kebumen"
                    },
                    {
                        value: "kendal",
                        text: "Kabupaten Kendal"
                    },
                    {
                        value: "klaten",
                        text: "Kabupaten Klaten"
                    },
                    {
                        value: "kudus",
                        text: "Kabupaten Kudus"
                    },
                    {
                        value: "magelang",
                        text: "Kabupaten Magelang"
                    },
                    {
                        value: "pati",
                        text: "Kabupaten Pati"
                    },
                    {
                        value: "pekalongan",
                        text: "Kabupaten Pekalongan"
                    },
                    {
                        value: "pemalang",
                        text: "Kabupaten Pemalang"
                    },
                    {
                        value: "purbalingga",
                        text: "Kabupaten Purbalingga"
                    },
                    {
                        value: "purworejo",
                        text: "Kabupaten Purworejo"
                    },
                    {
                        value: "rembang",
                        text: "Kabupaten Rembang"
                    },
                    {
                        value: "semarang",
                        text: "Kabupaten Semarang"
                    },
                    {
                        value: "sragen",
                        text: "Kabupaten Sragen"
                    },
                    {
                        value: "sukoharjo",
                        text: "Kabupaten Sukoharjo"
                    },
                    {
                        value: "tegal",
                        text: "Kabupaten Tegal"
                    },
                    {
                        value: "temanggung",
                        text: "Kabupaten Temanggung"
                    },
                    {
                        value: "wonogiri",
                        text: "Kabupaten Wonogiri"
                    },
                    {
                        value: "wonosobo",
                        text: "Kabupaten Wonosobo"
                    }
                ]
            },
            di_yogyakarta: {
                cities: [{
                    value: "yogyakarta",
                    text: "Kota Yogyakarta"
                }],
                kabupaten: [{
                        value: "bantul",
                        text: "Kabupaten Bantul"
                    },
                    {
                        value: "gunungkidul",
                        text: "Kabupaten Gunungkidul"
                    },
                    {
                        value: "kulon_progo",
                        text: "Kabupaten Kulon Progo"
                    },
                    {
                        value: "sleman",
                        text: "Kabupaten Sleman"
                    }
                ]
            },
            jawa_timur: {
                cities: [{
                        value: "batu",
                        text: "Kota Batu"
                    },
                    {
                        value: "blitar",
                        text: "Kota Blitar"
                    },
                    {
                        value: "kediri",
                        text: "Kota Kediri"
                    },
                    {
                        value: "madiun",
                        text: "Kota Madiun"
                    },
                    {
                        value: "malang",
                        text: "Kota Malang"
                    },
                    {
                        value: "mojokerto",
                        text: "Kota Mojokerto"
                    },
                    {
                        value: "pasuruan",
                        text: "Kota Pasuruan"
                    },
                    {
                        value: "probolinggo",
                        text: "Kota Probolinggo"
                    },
                    {
                        value: "surabaya",
                        text: "Kota Surabaya"
                    }
                ],
                kabupaten: [{
                        value: "bangkalan",
                        text: "Kabupaten Bangkalan"
                    },
                    {
                        value: "banyuwangi",
                        text: "Kabupaten Banyuwangi"
                    },
                    {
                        value: "blitar",
                        text: "Kabupaten Blitar"
                    },
                    {
                        value: "bojonegoro",
                        text: "Kabupaten Bojonegoro"
                    },
                    {
                        value: "bondowoso",
                        text: "Kabupaten Bondowoso"
                    },
                    {
                        value: "gresik",
                        text: "Kabupaten Gresik"
                    },
                    {
                        value: "jember",
                        text: "Kabupaten Jember"
                    },
                    {
                        value: "jombang",
                        text: "Kabupaten Jombang"
                    },
                    {
                        value: "kediri",
                        text: "Kabupaten Kediri"
                    },
                    {
                        value: "lamongan",
                        text: "Kabupaten Lamongan"
                    },
                    {
                        value: "lumajang",
                        text: "Kabupaten Lumajang"
                    },
                    {
                        value: "madiun",
                        text: "Kabupaten Madiun"
                    },
                    {
                        value: "magetan",
                        text: "Kabupaten Magetan"
                    },
                    {
                        value: "malang",
                        text: "Kabupaten Malang"
                    },
                    {
                        value: "mojokerto",
                        text: "Kabupaten Mojokerto"
                    },
                    {
                        value: "nganjuk",
                        text: "Kabupaten Nganjuk"
                    },
                    {
                        value: "ngawi",
                        text: "Kabupaten Ngawi"
                    },
                    {
                        value: "pacitan",
                        text: "Kabupaten Pacitan"
                    },
                    {
                        value: "pamekasan",
                        text: "Kabupaten Pamekasan"
                    },
                    {
                        value: "pasuruan",
                        text: "Kabupaten Pasuruan"
                    },
                    {
                        value: "ponorogo",
                        text: "Kabupaten Ponorogo"
                    },
                    {
                        value: "probolinggo",
                        text: "Kabupaten Probolinggo"
                    },
                    {
                        value: "sampang",
                        text: "Kabupaten Sampang"
                    },
                    {
                        value: "sidoarjo",
                        text: "Kabupaten Sidoarjo"
                    },
                    {
                        value: "situbondo",
                        text: "Kabupaten Situbondo"
                    },
                    {
                        value: "sumenep",
                        text: "Kabupaten Sumenep"
                    },
                    {
                        value: "trenggalek",
                        text: "Kabupaten Trenggalek"
                    },
                    {
                        value: "tuban",
                        text: "Kabupaten Tuban"
                    },
                    {
                        value: "tulungagung",
                        text: "Kabupaten Tulungagung"
                    }
                ]
            },
            bali: {
                cities: [{
                    value: "denpasar",
                    text: "Kota Denpasar"
                }],
                kabupaten: [{
                        value: "badung",
                        text: "Kabupaten Badung"
                    },
                    {
                        value: "bangli",
                        text: "Kabupaten Bangli"
                    },
                    {
                        value: "buleleng",
                        text: "Kabupaten Buleleng"
                    },
                    {
                        value: "gianyar",
                        text: "Kabupaten Gianyar"
                    },
                    {
                        value: "jembrana",
                        text: "Kabupaten Jembrana"
                    },
                    {
                        value: "karangasem",
                        text: "Kabupaten Karangasem"
                    },
                    {
                        value: "klungkung",
                        text: "Kabupaten Klungkung"
                    },
                    {
                        value: "tabanan",
                        text: "Kabupaten Tabanan"
                    }
                ]
            },
            nusa_tenggara_barat: {
                cities: [{
                        value: "bima",
                        text: "Kota Bima"
                    },
                    {
                        value: "mataram",
                        text: "Kota Mataram"
                    }
                ],
                kabupaten: [{
                        value: "bima",
                        text: "Kabupaten Bima"
                    },
                    {
                        value: "dompu",
                        text: "Kabupaten Dompu"
                    },
                    {
                        value: "lombok_barat",
                        text: "Kabupaten Lombok Barat"
                    },
                    {
                        value: "lombok_tengah",
                        text: "Kabupaten Lombok Tengah"
                    },
                    {
                        value: "lombok_timur",
                        text: "Kabupaten Lombok Timur"
                    },
                    {
                        value: "lombok_utara",
                        text: "Kabupaten Lombok Utara"
                    },
                    {
                        value: "sumbawa",
                        text: "Kabupaten Sumbawa"
                    },
                    {
                        value: "sumbawa_barat",
                        text: "Kabupaten Sumbawa Barat"
                    }
                ]
            },
            nusa_tenggara_timur: {
                cities: [{
                    value: "kupang",
                    text: "Kota Kupang"
                }],
                kabupaten: [{
                        value: "alor",
                        text: "Kabupaten Alor"
                    },
                    {
                        value: "belu",
                        text: "Kabupaten Belu"
                    },
                    {
                        value: "ende",
                        text: "Kabupaten Ende"
                    },
                    {
                        value: "flores_timur",
                        text: "Kabupaten Flores Timur"
                    },
                    {
                        value: "kupang",
                        text: "Kabupaten Kupang"
                    },
                    {
                        value: "lembata",
                        text: "Kabupaten Lembata"
                    },
                    {
                        value: "malaka",
                        text: "Kabupaten Malaka"
                    },
                    {
                        value: "manggarai",
                        text: "Kabupaten Manggarai"
                    },
                    {
                        value: "manggarai_barat",
                        text: "Kabupaten Manggarai Barat"
                    },
                    {
                        value: "manggarai_timur",
                        text: "Kabupaten Manggarai Timur"
                    },
                    {
                        value: "nagekeo",
                        text: "Kabupaten Nagekeo"
                    },
                    {
                        value: "ngada",
                        text: "Kabupaten Ngada"
                    },
                    {
                        value: "rote_ndao",
                        text: "Kabupaten Rote Ndao"
                    },
                    {
                        value: "sabu_raijua",
                        text: "Kabupaten Sabu Raijua"
                    },
                    {
                        value: "sikka",
                        text: "Kabupaten Sikka"
                    },
                    {
                        value: "sumba_barat",
                        text: "Kabupaten Sumba Barat"
                    },
                    {
                        value: "sumba_barat_daya",
                        text: "Kabupaten Sumba Barat Daya"
                    },
                    {
                        value: "sumba_tengah",
                        text: "Kabupaten Sumba Tengah"
                    },
                    {
                        value: "sumba_timur",
                        text: "Kabupaten Sumba Timur"
                    },
                    {
                        value: "timor_tengah_selatan",
                        text: "Kabupaten Timor Tengah Selatan"
                    },
                    {
                        value: "timor_tengah_utara",
                        text: "Kabupaten Timor Tengah Utara"
                    }
                ]
            },
            kalimantan_barat: {
                cities: [{
                        value: "pontianak",
                        text: "Kota Pontianak"
                    },
                    {
                        value: "singkawang",
                        text: "Kota Singkawang"
                    }
                ],
                kabupaten: [{
                        value: "bengkayang",
                        text: "Kabupaten Bengkayang"
                    },
                    {
                        value: "kapuas_hulu",
                        text: "Kabupaten Kapuas Hulu"
                    },
                    {
                        value: "kayong_utara",
                        text: "Kabupaten Kayong Utara"
                    },
                    {
                        value: "ketapang",
                        text: "Kabupaten Ketapang"
                    },
                    {
                        value: "kubu_raya",
                        text: "Kabupaten Kubu Raya"
                    },
                    {
                        value: "landak",
                        text: "Kabupaten Landak"
                    },
                    {
                        value: "melawi",
                        text: "Kabupaten Melawi"
                    },
                    {
                        value: "mempawah",
                        text: "Kabupaten Mempawah"
                    },
                    {
                        value: "sambas",
                        text: "Kabupaten Sambas"
                    },
                    {
                        value: "sanggau",
                        text: "Kabupaten Sanggau"
                    },
                    {
                        value: "sekadau",
                        text: "Kabupaten Sekadau"
                    },
                    {
                        value: "sintang",
                        text: "Kabupaten Sintang"
                    }
                ]
            },
            kalimantan_tengah: {
                cities: [{
                    value: "palangka_raya",
                    text: "Kota Palangka Raya"
                }],
                kabupaten: [{
                        value: "barito_selatan",
                        text: "Kabupaten Barito Selatan"
                    },
                    {
                        value: "barito_timur",
                        text: "Kabupaten Barito Timur"
                    },
                    {
                        value: "barito_utara",
                        text: "Kabupaten Barito Utara"
                    },
                    {
                        value: "gunung_mas",
                        text: "Kabupaten Gunung Mas"
                    },
                    {
                        value: "kapuas",
                        text: "Kabupaten Kapuas"
                    },
                    {
                        value: "katingan",
                        text: "Kabupaten Katingan"
                    },
                    {
                        value: "kotawaringin_barat",
                        text: "Kabupaten Kotawaringin Barat"
                    },
                    {
                        value: "kotawaringin_timur",
                        text: "Kabupaten Kotawaringin Timur"
                    },
                    {
                        value: "lamandau",
                        text: "Kabupaten Lamandau"
                    },
                    {
                        value: "murung_raya",
                        text: "Kabupaten Murung Raya"
                    },
                    {
                        value: "pulang_pisau",
                        text: "Kabupaten Pulang Pisau"
                    },
                    {
                        value: "sukamara",
                        text: "Kabupaten Sukamara"
                    },
                    {
                        value: "seruyan",
                        text: "Kabupaten Seruyan"
                    }
                ]
            },
            kalimantan_selatan: {
                cities: [{
                        value: "banjarbaru",
                        text: "Kota Banjarbaru"
                    },
                    {
                        value: "banjarmasin",
                        text: "Kota Banjarmasin"
                    }
                ],
                kabupaten: [{
                        value: "balangan",
                        text: "Kabupaten Balangan"
                    },
                    {
                        value: "banjar",
                        text: "Kabupaten Banjar"
                    },
                    {
                        value: "barito_kuala",
                        text: "Kabupaten Barito Kuala"
                    },
                    {
                        value: "hulu_sungai_selatan",
                        text: "Kabupaten Hulu Sungai Selatan"
                    },
                    {
                        value: "hulu_sungai_tengah",
                        text: "Kabupaten Hulu Sungai Tengah"
                    },
                    {
                        value: "hulu_sungai_utara",
                        text: "Kabupaten Hulu Sungai Utara"
                    },
                    {
                        value: "kotabaru",
                        text: "Kabupaten Kotabaru"
                    },
                    {
                        value: "tabalong",
                        text: "Kabupaten Tabalong"
                    },
                    {
                        value: "tanah_bumbu",
                        text: "Kabupaten Tanah Bumbu"
                    },
                    {
                        value: "tanah_laut",
                        text: "Kabupaten Tanah Laut"
                    },
                    {
                        value: "tapin",
                        text: "Kabupaten Tapin"
                    }
                ]
            },
            kalimantan_timur: {
                cities: [{
                        value: "balikpapan",
                        text: "Kota Balikpapan"
                    },
                    {
                        value: "bontang",
                        text: "Kota Bontang"
                    },
                    {
                        value: "samarinda",
                        text: "Kota Samarinda"
                    }
                ],
                kabupaten: [{
                        value: "berau",
                        text: "Kabupaten Berau"
                    },
                    {
                        value: "kutai_barat",
                        text: "Kabupaten Kutai Barat"
                    },
                    {
                        value: "kutai_kartanegara",
                        text: "Kabupaten Kutai Kartanegara"
                    },
                    {
                        value: "kutai_timur",
                        text: "Kabupaten Kutai Timur"
                    },
                    {
                        value: "mahakam_ulu",
                        text: "Kabupaten Mahakam Ulu"
                    },
                    {
                        value: "paser",
                        text: "Kabupaten Paser"
                    },
                    {
                        value: "penajam_paser_utara",
                        text: "Kabupaten Penajam Paser Utara"
                    }
                ]
            },
            kalimantan_utara: {
                cities: [{
                    value: "tarakan",
                    text: "Kota Tarakan"
                }],
                kabupaten: [{
                        value: "bulungan",
                        text: "Kabupaten Bulungan"
                    },
                    {
                        value: "malinau",
                        text: "Kabupaten Malinau"
                    },
                    {
                        value: "nunukan",
                        text: "Kabupaten Nunukan"
                    },
                    {
                        value: "tana_tidum",
                        text: "Kabupaten Tana Tidung"
                    }
                ]
            },
            sulawesi_utara: {
                cities: [{
                        value: "bitung",
                        text: "Kota Bitung"
                    },
                    {
                        value: "kotamobagu",
                        text: "Kota Kotamobagu"
                    },
                    {
                        value: "manado",
                        text: "Kota Manado"
                    },
                    {
                        value: "tomohon",
                        text: "Kota Tomohon"
                    }
                ],
                kabupaten: [{
                        value: "bolaang_mongondow",
                        text: "Kabupaten Bolaang Mongondow"
                    },
                    {
                        value: "bolaang_mongondow_selatan",
                        text: "Kabupaten Bolaang Mongondow Selatan"
                    },
                    {
                        value: "bolaang_mongondow_timur",
                        text: "Kabupaten Bolaang Mongondow Timur"
                    },
                    {
                        value: "bolaang_mongondow_utara",
                        text: "Kabupaten Bolaang Mongondow Utara"
                    },
                    {
                        value: "kepulauan_sangihe",
                        text: "Kabupaten Kepulauan Sangihe"
                    },
                    {
                        value: "kepulauan_siau_tagulandang_biaro",
                        text: "Kabupaten Kepulauan Siau Tagulandang Biaro"
                    },
                    {
                        value: "kepulauan_talaud",
                        text: "Kabupaten Kepulauan Talaud"
                    },
                    {
                        value: "minahasa",
                        text: "Kabupaten Minahasa"
                    },
                    {
                        value: "minahasa_selatan",
                        text: "Kabupaten Minahasa Selatan"
                    },
                    {
                        value: "minahasa_tenggara",
                        text: "Kabupaten Minahasa Tenggara"
                    },
                    {
                        value: "minahasa_utara",
                        text: "Kabupaten Minahasa Utara"
                    }
                ]
            },
            sulawesi_tengah: {
                cities: [{
                    value: "palu",
                    text: "Kota Palu"
                }],
                kabupaten: [{
                        value: "banggai",
                        text: "Kabupaten Banggai"
                    },
                    {
                        value: "banggai_kepulauan",
                        text: "Kabupaten Banggai Kepulauan"
                    },
                    {
                        value: "banggai_laut",
                        text: "Kabupaten Banggai Laut"
                    },
                    {
                        value: "buol",
                        text: "Kabupaten Buol"
                    },
                    {
                        value: "donggala",
                        text: "Kabupaten Donggala"
                    },
                    {
                        value: "morowali",
                        text: "Kabupaten Morowali"
                    },
                    {
                        value: "morowali_utara",
                        text: "Kabupaten Morowali Utara"
                    },
                    {
                        value: "parigi_moutong",
                        text: "Kabupaten Parigi Moutong"
                    },
                    {
                        value: "poso",
                        text: "Kabupaten Poso"
                    },
                    {
                        value: "sigi",
                        text: "Kabupaten Sigi"
                    },
                    {
                        value: "tojo_una-una",
                        text: "Kabupaten Tojo Una-Una"
                    },
                    {
                        value: "tolitoli",
                        text: "Kabupaten Tolitoli"
                    }
                ]
            },
            sulawesi_selatan: {
                cities: [{
                        value: "makassar",
                        text: "Kota Makassar"
                    },
                    {
                        value: "palopo",
                        text: "Kota Palopo"
                    },
                    {
                        value: "parepare",
                        text: "Kota Parepare"
                    }
                ],
                kabupaten: [{
                        value: "bantaeng",
                        text: "Kabupaten Bantaeng"
                    },
                    {
                        value: "barru",
                        text: "Kabupaten Barru"
                    },
                    {
                        value: "bone",
                        text: "Kabupaten Bone"
                    },
                    {
                        value: "bulukumba",
                        text: "Kabupaten Bulukumba"
                    },
                    {
                        value: "enrekang",
                        text: "Kabupaten Enrekang"
                    },
                    {
                        value: "gowa",
                        text: "Kabupaten Gowa"
                    },
                    {
                        value: "jeneponto",
                        text: "Kabupaten Jeneponto"
                    },
                    {
                        value: "kepulauan_selayar",
                        text: "Kabupaten Kepulauan Selayar"
                    },
                    {
                        value: "luwu",
                        text: "Kabupaten Luwu"
                    },
                    {
                        value: "luwu_timur",
                        text: "Kabupaten Luwu Timur"
                    },
                    {
                        value: "luwu_utara",
                        text: "Kabupaten Luwu Utara"
                    },
                    {
                        value: "maros",
                        text: "Kabupaten Maros"
                    },
                    {
                        value: "pangkajene_dan_kepulauan",
                        text: "Kabupaten Pangkajene dan Kepulauan"
                    },
                    {
                        value: "pinrang",
                        text: "Kabupaten Pinrang"
                    },
                    {
                        value: "sidenreng_rappang",
                        text: "Kabupaten Sidenreng Rappang"
                    },
                    {
                        value: "sinjai",
                        text: "Kabupaten Sinjai"
                    },
                    {
                        value: "soppeng",
                        text: "Kabupaten Soppeng"
                    },
                    {
                        value: "takalar",
                        text: "Kabupaten Takalar"
                    },
                    {
                        value: "tana_toraja",
                        text: "Kabupaten Tana Toraja"
                    },
                    {
                        value: "toraja_utara",
                        text: "Kabupaten Toraja Utara"
                    },
                    {
                        value: "wajo",
                        text: "Kabupaten Wajo"
                    }
                ]
            },
            sulawesi_tenggara: {
                cities: [{
                        value: "baubau",
                        text: "Kota Baubau"
                    },
                    {
                        value: "kendari",
                        text: "Kota Kendari"
                    }
                ],
                kabupaten: [{
                        value: "bombana",
                        text: "Kabupaten Bombana"
                    },
                    {
                        value: "buton",
                        text: "Kabupaten Buton"
                    },
                    {
                        value: "buton_selatan",
                        text: "Kabupaten Buton Selatan"
                    },
                    {
                        value: "buton_tengah",
                        text: "Kabupaten Buton Tengah"
                    },
                    {
                        value: "buton_utara",
                        text: "Kabupaten Buton Utara"
                    },
                    {
                        value: "kolaka",
                        text: "Kabupaten Kolaka"
                    },
                    {
                        value: "kolaka_timur",
                        text: "Kabupaten Kolaka Timur"
                    },
                    {
                        value: "kolaka_utara",
                        text: "Kabupaten Kolaka Utara"
                    },
                    {
                        value: "konawe",
                        text: "Kabupaten Konawe"
                    },
                    {
                        value: "konawe_kepulauan",
                        text: "Kabupaten Konawe Kepulauan"
                    },
                    {
                        value: "konawe_selatan",
                        text: "Kabupaten Konawe Selatan"
                    },
                    {
                        value: "konawe_utara",
                        text: "Kabupaten Konawe Utara"
                    },
                    {
                        value: "muna",
                        text: "Kabupaten Muna"
                    },
                    {
                        value: "muna_barat",
                        text: "Kabupaten Muna Barat"
                    },
                    {
                        value: "wakatobi",
                        text: "Kabupaten Wakatobi"
                    }
                ]
            },
            gorontalo: {
                cities: [{
                    value: "gorontalo",
                    text: "Kota Gorontalo"
                }],
                kabupaten: [{
                        value: "boalemo",
                        text: "Kabupaten Boalemo"
                    },
                    {
                        value: "bone_bolango",
                        text: "Kabupaten Bone Bolango"
                    },
                    {
                        value: "gorontalo",
                        text: "Kabupaten Gorontalo"
                    },
                    {
                        value: "gorontalo_utara",
                        text: "Kabupaten Gorontalo Utara"
                    },
                    {
                        value: "pohuwato",
                        text: "Kabupaten Pohuwato"
                    }
                ]
            },
            sulawesi_barat: {
                cities: [
                    // No cities in Sulawesi Barat
                ],
                kabupaten: [{
                        value: "majene",
                        text: "Kabupaten Majene"
                    },
                    {
                        value: "mamasa",
                        text: "Kabupaten Mamasa"
                    },
                    {
                        value: "mamuju",
                        text: "Kabupaten Mamuju"
                    },
                    {
                        value: "mamuju_tengah",
                        text: "Kabupaten Mamuju Tengah"
                    },
                    {
                        value: "pasangkayu",
                        text: "Kabupaten Pasangkayu"
                    },
                    {
                        value: "polewali_mandar",
                        text: "Kabupaten Polewali Mandar"
                    }
                ]
            },
            maluku: {
                cities: [{
                        value: "ambon",
                        text: "Kota Ambon"
                    },
                    {
                        value: "tual",
                        text: "Kota Tual"
                    }
                ],
                kabupaten: [{
                        value: "buru",
                        text: "Kabupaten Buru"
                    },
                    {
                        value: "buru_selatan",
                        text: "Kabupaten Buru Selatan"
                    },
                    {
                        value: "kepulauan_aru",
                        text: "Kabupaten Kepulauan Aru"
                    },
                    {
                        value: "maluku_barat_daya",
                        text: "Kabupaten Maluku Barat Daya"
                    },
                    {
                        value: "maluku_tengah",
                        text: "Kabupaten Maluku Tengah"
                    },
                    {
                        value: "maluku_tenggara",
                        text: "Kabupaten Maluku Tenggara"
                    },
                    {
                        value: "maluku_tenggara_barat",
                        text: "Kabupaten Maluku Tenggara Barat"
                    },
                    {
                        value: "seram_bagian_barat",
                        text: "Kabupaten Seram Bagian Barat"
                    },
                    {
                        value: "seram_bagian_timur",
                        text: "Kabupaten Seram Bagian Timur"
                    }
                ]
            },
            maluku_utara: {
                cities: [{
                        value: "ternate",
                        text: "Kota Ternate"
                    },
                    {
                        value: "tidore_kepulauan",
                        text: "Kota Tidore Kepulauan"
                    }
                ],
                kabupaten: [{
                        value: "halmahera_barat",
                        text: "Kabupaten Halmahera Barat"
                    },
                    {
                        value: "halmahera_tengah",
                        text: "Kabupaten Halmahera Tengah"
                    },
                    {
                        value: "halmahera_timur",
                        text: "Kabupaten Halmahera Timur"
                    },
                    {
                        value: "halmahera_selatan",
                        text: "Kabupaten Halmahera Selatan"
                    },
                    {
                        value: "halmahera_utara",
                        text: "Kabupaten Halmahera Utara"
                    },
                    {
                        value: "kepulauan_sula",
                        text: "Kabupaten Kepulauan Sula"
                    },
                    {
                        value: "pulau_morotai",
                        text: "Kabupaten Pulau Morotai"
                    },
                    {
                        value: "pulau_taliabu",
                        text: "Kabupaten Pulau Taliabu"
                    }
                ]
            },
            papua_barat: {
                cities: [{
                    value: "sorong",
                    text: "Kota Sorong"
                }],
                kabupaten: [{
                        value: "fakfak",
                        text: "Kabupaten Fakfak"
                    },
                    {
                        value: "kaimana",
                        text: "Kabupaten Kaimana"
                    },
                    {
                        value: "manokwari",
                        text: "Kabupaten Manokwari"
                    },
                    {
                        value: "manokwari_selatan",
                        text: "Kabupaten Manokwari Selatan"
                    },
                    {
                        value: "pegunungan_arfak",
                        text: "Kabupaten Pegunungan Arfak"
                    },
                    {
                        value: "raja_ampat",
                        text: "Kabupaten Raja Ampat"
                    },
                    {
                        value: "sorong",
                        text: "Kabupaten Sorong"
                    },
                    {
                        value: "sorong_selatan",
                        text: "Kabupaten Sorong Selatan"
                    },
                    {
                        value: "tambrauw",
                        text: "Kabupaten Tambrauw"
                    },
                    {
                        value: "teluk_bintuni",
                        text: "Kabupaten Teluk Bintuni"
                    },
                    {
                        value: "teluk_wondama",
                        text: "Kabupaten Teluk Wondama"
                    }
                ]
            },
            papua: {
                cities: [
                    // No cities in Papua
                ],
                kabupaten: [{
                        value: "asmat",
                        text: "Kabupaten Asmat"
                    },
                    {
                        value: "biak_numfor",
                        text: "Kabupaten Biak Numfor"
                    },
                    {
                        value: "boven_digoel",
                        text: "Kabupaten Boven Digoel"
                    },
                    {
                        value: "deiyai",
                        text: "Kabupaten Deiyai"
                    },
                    {
                        value: "dogiyai",
                        text: "Kabupaten Dogiyai"
                    },
                    {
                        value: "intan_jaya",
                        text: "Kabupaten Intan Jaya"
                    },
                    {
                        value: "jayapura",
                        text: "Kabupaten Jayapura"
                    },
                    {
                        value: "jayawijaya",
                        text: "Kabupaten Jayawijaya"
                    },
                    {
                        value: "keerom",
                        text: "Kabupaten Keerom"
                    },
                    {
                        value: "lanny_jaya",
                        text: "Kabupaten Lanny Jaya"
                    },
                    {
                        value: "mamberamo_raya",
                        text: "Kabupaten Mamberamo Raya"
                    },
                    {
                        value: "mamberamo_tengah",
                        text: "Kabupaten Mamberamo Tengah"
                    },
                    {
                        value: "mappi",
                        text: "Kabupaten Mappi"
                    },
                    {
                        value: "merauke",
                        text: "Kabupaten Merauke"
                    },
                    {
                        value: "mimika",
                        text: "Kabupaten Mimika"
                    },
                    {
                        value: "nabire",
                        text: "Kabupaten Nabire"
                    },
                    {
                        value: "nduga",
                        text: "Kabupaten Nduga"
                    },
                    {
                        value: "paniai",
                        text: "Kabupaten Paniai"
                    },
                    {
                        value: "pegunungan_bintang",
                        text: "Kabupaten Pegunungan Bintang"
                    },
                    {
                        value: "puncak",
                        text: "Kabupaten Puncak"
                    },
                    {
                        value: "puncak_jaya",
                        text: "Kabupaten Puncak Jaya"
                    },
                    {
                        value: "sarmi",
                        text: "Kabupaten Sarmi"
                    },
                    {
                        value: "supiori",
                        text: "Kabupaten Supiori"
                    },
                    {
                        value: "tolikara",
                        text: "Kabupaten Tolikara"
                    },
                    {
                        value: "waropen",
                        text: "Kabupaten Waropen"
                    },
                    {
                        value: "yahukimo",
                        text: "Kabupaten Yahukimo"
                    },
                    {
                        value: "yalimo",
                        text: "Kabupaten Yalimo"
                    }
                ]
            }
        };
        if (data[province].cities.length === 0) {
            citySelect.append(new Option("Other", "other"));
        } else {
            data[province].cities.forEach(city => {
                citySelect.append(new Option(city.text, city.value));
            });
        }
        data[province].kabupaten.forEach(kab => {
            kabupatenSelect.append(new Option(kab.text, kab.value));
        });
    }
</script>

<script>
    function exportToPDF() {
        const element = document.getElementById('patient-data'); // Target container
        html2pdf(element, {
            margin: 10,
            filename: 'Data_Pasien.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'portrait'
            }
        });
    }
</script>

</body>

</html>