<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        Dokumen PPDB | TK Mekar Tigo Jangko
    </title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        body {

            background: #f4f7fb;
            font-family: 'Poppins', sans-serif;

        }


        .ppdb-card {

            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .1);

        }



        .step {

            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;

        }



        .step-item {

            text-align: center;
            flex: 1;
            font-size: 14px;

        }



        .circle {

            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;

        }



        .active .circle {

            background: #0d6efd;
            color: white;

        }


        .active {

            color: #0d6efd;
            font-weight: bold;

        }
    </style>

</head>



<body>


    <div class="container">


        <div class="ppdb-card">



            <h3 class="text-center mb-4">
                📂 Data Orang Tua & Dokumen
            </h3>




            <!-- Progress -->


            <div class="step">


                <div class="step-item active">

                    <div class="circle">
                        1
                    </div>

                    Akun

                </div>



                <div class="step-item active">

                    <div class="circle">
                        2
                    </div>

                    Anak

                </div>



                <div class="step-item active">

                    <div class="circle">
                        3
                    </div>

                    Dokumen

                </div>



            </div>





            <form action="{{ route('ppdb.storeDokumen') }}" method="POST" enctype="multipart/form-data">


                @csrf




                <h5 class="mb-3">
                    👨‍👩‍👧 Data Orang Tua Anak
                </h5>



                <div class="mb-3">

                    <label class="form-label">
                        Nama Ayah *
                    </label>


                    <input type="text" name="nama_ayah" class="form-control" placeholder="Masukkan nama ayah"
                        required>

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Nama Ibu *
                    </label>


                    <input type="text" name="nama_ibu" class="form-control" placeholder="Masukkan nama ibu" required>

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Alamat *
                    </label>


                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>


                </div>





                <hr>


                <h5 class="mb-3">
                    📂 Upload Dokumen
                </h5>




                <div class="mb-3">

                    <label>
                        Akta Kelahiran *
                    </label>


                    <input type="file" name="akta_kelahiran" class="form-control" required>

                </div>



                <div class="mb-3">

                    <label>
                        Kartu Keluarga *
                    </label>


                    <input type="file" name="kartu_keluarga" class="form-control" required>

                </div>



                <div class="mb-3">

                    <label>
                        KTP Orang Tua *
                    </label>


                    <input type="file" name="ktp_orang_tua" class="form-control" required>

                </div>




                <div class="mb-3">

                    <label>
                        Ijazah PAUD
                    </label>


                    <input type="file" name="ijazah_paud" class="form-control">

                </div>




                <div class="mb-3">

                    <label>
                        Pas Foto Anak
                    </label>


                    <input type="file" name="pas_foto" class="form-control">

                </div>





                <div class="d-flex justify-content-between mt-4">


                    <a href="{{ route('ppdb.anak') }}" class="btn btn-secondary">

                        ← Kembali

                    </a>



                    <button type="submit" class="btn btn-success">

                        Kirim Pendaftaran ✓

                    </button>



                </div>



            </form>


        </div>


    </div>


</body>

</html>
