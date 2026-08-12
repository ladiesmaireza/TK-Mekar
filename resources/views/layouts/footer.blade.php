{{-- =========================================================
     FOOTER WEBSITE
     TK MEKAR TIGO JANGKO
========================================================= --}}

<footer class="school-footer">

    <div class="container">

        <div class="row gy-4">

            {{-- =================================================
                 ALAMAT
            ================================================== --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="footer-item">

                    <div class="footer-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <h6>Alamat</h6>

                    <p>
                        Jorong Rajawali<br>
                        Nagari Tigo Jangko<br>
                        Kecamatan Lintau Buo<br>
                        Kabupaten Tanah Datar
                    </p>

                </div>

            </div>


            {{-- =================================================
                 KONTAK
            ================================================== --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="footer-item">

                    <div class="footer-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <h6>Kontak</h6>

                    <a href="tel:+6282371496967" class="footer-link">
                        +62 823 7149 6967
                    </a>

                    <a href="mailto:tkmekartigojangko@gmail.com" class="footer-link">

                        tkmekartigojangko@gmail.com

                    </a>

                </div>

            </div>


            {{-- =================================================
                 JAM OPERASIONAL
            ================================================== --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="footer-item">

                    <div class="footer-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                    <h6>Jam Operasional</h6>

                    <div class="footer-schedule">

                        <div>
                            <span>Jam Kantor</span>

                            <strong>
                                Senin - Sabtu
                            </strong>

                            <small>
                                07.30 - 15.00 WIB
                            </small>
                        </div>


                        <div class="mt-3">

                            <span>Jam Sekolah</span>

                            <strong>
                                Senin - Sabtu
                            </strong>

                            <small>
                                07.30 - 11.00 WIB
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 LOGO SEKOLAH
            ================================================== --}}
            <div class="col-12 col-sm-6 col-lg-3">

                <div class="footer-brand">

                    <div class="footer-logo">

                        <img src="{{ asset('assets/img/logo-tk.jpg') }}" alt="Logo TK Mekar Tigo Jangko">

                    </div>

                    <h5>
                        Taman Kanak-Kanak
                        Mekar Tigo Jangko
                    </h5>

                    <p>
                        Mewujudkan Anak yang Cerdas,
                        Kreatif, Mandiri dan Berakhlak Mulia.
                    </p>

                </div>

            </div>

        </div>


        {{-- =================================================
             GARIS PEMISAH
        ================================================== --}}
        <div class="footer-divider"></div>


        {{-- =================================================
             FOOTER BOTTOM
        ================================================== --}}
        <div class="footer-bottom">

            <div>
                <span>
                    &copy; {{ date('Y') }}
                    Taman Kanak-Kanak Mekar Tigo Jangko
                </span>
            </div>

            <div>
                <span>
                    Sistem Informasi Sekolah
                </span>
            </div>

        </div>

    </div>

</footer>
