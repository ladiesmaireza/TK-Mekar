<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\AkunPPDBMail;
use App\Mail\PendaftaranPPDBMail;
use App\Mail\StatusPPDBMail;

class PendaftaranController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | AKUN PPDB
    |--------------------------------------------------------------------------
    */

    public function akun()
    {
        return view('ppdb.akun');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 1 - DATA ORANG TUA
    |--------------------------------------------------------------------------
    */

    public function step1()
    {
        return view('ppdb.step1');
    }


    public function storeStep1(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:orang_tua,email',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:6',
                    'confirmed',
                ],
            ],
            [
                'nama.required' =>
                'Nama orang tua wajib diisi.',

                'nama.max' =>
                'Nama orang tua maksimal 255 karakter.',

                'email.required' =>
                'Email wajib diisi.',

                'email.email' =>
                'Format email tidak valid.',

                'email.max' =>
                'Email maksimal 255 karakter.',

                'email.unique' =>
                'Email tersebut sudah terdaftar. Silakan gunakan email lain.',

                'password.required' =>
                'Password wajib diisi.',

                'password.min' =>
                'Password minimal 6 karakter.',

                'password.confirmed' =>
                'Konfirmasi password tidak sesuai.',
            ]
        );

        session([
            'orang_tua' => [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'no_hp' => null,
                'alamat' => null,
            ],
        ]);

        return redirect()
            ->route('ppdb.step2');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 2 - DATA ANAK
    |--------------------------------------------------------------------------
    */

    public function step2()
    {
        if (!Auth::guard('orangtua')->check()) {
            return redirect()
                ->route('orangtua.login')
                ->with(
                    'error',
                    'Silakan login sebagai orang tua terlebih dahulu.'
                );
        }

        return view('ppdb.step2');
    }


    public function storeStep2(Request $request)
    {
        $request->validate(
            [
                'nama_lengkap' =>
                'required|string|max:255',

                'tempat_lahir' =>
                'required|string|max:255',

                'tanggal_lahir' =>
                'required|date',

                'jenis_kelamin' =>
                'required|in:Laki-laki,Perempuan',

                'nama_ayah' =>
                'required|string|max:255',

                'nama_ibu' =>
                'required|string|max:255',

                'no_hp' =>
                'required|string|max:20',

                'alamat' =>
                'required|string|max:1000',
            ],
            [
                'nama_lengkap.required' =>
                'Nama lengkap anak wajib diisi.',

                'nama_lengkap.max' =>
                'Nama lengkap anak maksimal 255 karakter.',

                'tempat_lahir.required' =>
                'Tempat lahir wajib diisi.',

                'tempat_lahir.max' =>
                'Tempat lahir maksimal 255 karakter.',

                'tanggal_lahir.required' =>
                'Tanggal lahir wajib diisi.',

                'tanggal_lahir.date' =>
                'Format tanggal lahir tidak valid.',

                'jenis_kelamin.required' =>
                'Jenis kelamin wajib dipilih.',

                'jenis_kelamin.in' =>
                'Jenis kelamin tidak valid.',

                'nama_ayah.required' =>
                'Nama ayah wajib diisi.',

                'nama_ibu.required' =>
                'Nama ibu wajib diisi.',

                'no_hp.required' =>
                'Nomor HP wajib diisi.',

                'no_hp.max' =>
                'Nomor HP maksimal 20 karakter.',

                'alamat.required' =>
                'Alamat wajib diisi.',

                'alamat.max' =>
                'Alamat maksimal 1000 karakter.',
            ]
        );

        session([
            'anak' => [
                'nama_lengkap' =>
                $request->nama_lengkap,

                'tempat_lahir' =>
                $request->tempat_lahir,

                'tanggal_lahir' =>
                $request->tanggal_lahir,

                'jenis_kelamin' =>
                $request->jenis_kelamin,

                'nama_ayah' =>
                $request->nama_ayah,

                'nama_ibu' =>
                $request->nama_ibu,
            ],
        ]);

        session()->put(
            'orang_tua.no_hp',
            $request->no_hp
        );

        session()->put(
            'orang_tua.alamat',
            $request->alamat
        );

        return redirect()
            ->route('ppdb.step3');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3 - UPLOAD DOKUMEN
    |--------------------------------------------------------------------------
    */

    public function step3()
    {
        if (
            !session()->has('orang_tua') ||
            !session()->has('anak')
        ) {
            return redirect()
                ->route('ppdb.akun')
                ->with(
                    'error',
                    'Silakan lengkapi Step 1 dan Step 2 terlebih dahulu.'
                );
        }

        return view('ppdb.step3');
    }


    public function storeStep3(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI DOKUMEN
        |--------------------------------------------------------------------------
        */

        $request->validate(
            [
                'akta_kelahiran' =>
                'required|file|mimes:pdf,jpg,jpeg,png|max:2048',

                'kartu_keluarga' =>
                'required|file|mimes:pdf,jpg,jpeg,png|max:2048',

                'ktp_orang_tua' =>
                'required|file|mimes:pdf,jpg,jpeg,png|max:2048',

                'ijazah_paud' =>
                'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',

                'pas_foto' =>
                'nullable|file|mimes:jpg,jpeg,png|max:2048',

                'persetujuan' =>
                'required|accepted',
            ],
            [
                'akta_kelahiran.required' =>
                'Akta kelahiran wajib diunggah.',

                'akta_kelahiran.file' =>
                'Akta kelahiran harus berupa file.',

                'akta_kelahiran.mimes' =>
                'Akta kelahiran harus berupa PDF, JPG, JPEG, atau PNG.',

                'akta_kelahiran.max' =>
                'Ukuran Akta Kelahiran maksimal 2 MB.',

                'kartu_keluarga.required' =>
                'Kartu Keluarga wajib diunggah.',

                'kartu_keluarga.file' =>
                'Kartu Keluarga harus berupa file.',

                'kartu_keluarga.mimes' =>
                'Kartu Keluarga harus berupa PDF, JPG, JPEG, atau PNG.',

                'kartu_keluarga.max' =>
                'Ukuran Kartu Keluarga maksimal 2 MB.',

                'ktp_orang_tua.required' =>
                'KTP orang tua wajib diunggah.',

                'ktp_orang_tua.file' =>
                'KTP orang tua harus berupa file.',

                'ktp_orang_tua.mimes' =>
                'KTP orang tua harus berupa PDF, JPG, JPEG, atau PNG.',

                'ktp_orang_tua.max' =>
                'Ukuran KTP orang tua maksimal 2 MB.',

                'ijazah_paud.file' =>
                'Ijazah PAUD harus berupa file.',

                'ijazah_paud.mimes' =>
                'Ijazah PAUD harus berupa PDF, JPG, JPEG, atau PNG.',

                'ijazah_paud.max' =>
                'Ukuran Ijazah PAUD maksimal 2 MB.',

                'pas_foto.file' =>
                'Pas foto harus berupa file.',

                'pas_foto.mimes' =>
                'Pas foto harus berupa JPG, JPEG, atau PNG.',

                'pas_foto.max' =>
                'Ukuran pas foto maksimal 2 MB.',

                'persetujuan.required' =>
                'Persetujuan wajib dicentang.',

                'persetujuan.accepted' =>
                'Anda harus menyetujui pernyataan pendaftaran.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | CEK SESSION
        |--------------------------------------------------------------------------
        */

        $ortu = session('orang_tua');
        $anak = session('anak');

        if (!$ortu || !$anak) {
            return redirect()
                ->route('ppdb.akun')
                ->with(
                    'error',
                    'Session pendaftaran sudah habis. Silakan mulai kembali dari Step 1.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK DATA ORANG TUA
        |--------------------------------------------------------------------------
        */

        if (
            empty($ortu['nama']) ||
            empty($ortu['email']) ||
            empty($ortu['password']) ||
            empty($ortu['no_hp']) ||
            empty($ortu['alamat'])
        ) {
            session()->forget([
                'orang_tua',
                'anak',
            ]);

            return redirect()
                ->route('ppdb.akun')
                ->with(
                    'error',
                    'Data orang tua belum lengkap. Silakan mulai kembali.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CEK EMAIL
        |--------------------------------------------------------------------------
        */

        if (
            OrangTua::where(
                'email',
                $ortu['email']
            )->exists()
        ) {
            session()->forget([
                'orang_tua',
                'anak',
            ]);

            return redirect()
                ->route('ppdb.akun')
                ->with(
                    'error',
                    'Email tersebut sudah terdaftar. Silakan gunakan email lain.'
                );
        }


        $passwordAsli = $ortu['password'];

        $uploadedFiles = [];

        try {

            DB::beginTransaction();


            /*
            |--------------------------------------------------------------------------
            | SIMPAN ORANG TUA
            |--------------------------------------------------------------------------
            */

            $orangTua = OrangTua::create([
                'nama' =>
                $ortu['nama'],

                'email' =>
                $ortu['email'],

                'password' =>
                Hash::make($passwordAsli),

                'no_hp' =>
                $ortu['no_hp'],

                'alamat' =>
                $ortu['alamat'],
            ]);


            /*
            |--------------------------------------------------------------------------
            | SIMPAN AKTA
            |--------------------------------------------------------------------------
            */

            $akta = $request
                ->file('akta_kelahiran')
                ->store(
                    'dokumen/akta',
                    'public'
                );

            $uploadedFiles[] = $akta;


            /*
            |--------------------------------------------------------------------------
            | SIMPAN KK
            |--------------------------------------------------------------------------
            */

            $kk = $request
                ->file('kartu_keluarga')
                ->store(
                    'dokumen/kk',
                    'public'
                );

            $uploadedFiles[] = $kk;


            /*
            |--------------------------------------------------------------------------
            | SIMPAN KTP
            |--------------------------------------------------------------------------
            */

            $ktp = $request
                ->file('ktp_orang_tua')
                ->store(
                    'dokumen/ktp',
                    'public'
                );

            $uploadedFiles[] = $ktp;


            /*
            |--------------------------------------------------------------------------
            | SIMPAN IJAZAH
            |--------------------------------------------------------------------------
            */

            $ijazah = null;

            if ($request->hasFile('ijazah_paud')) {

                $ijazah = $request
                    ->file('ijazah_paud')
                    ->store(
                        'dokumen/ijazah',
                        'public'
                    );

                $uploadedFiles[] = $ijazah;
            }


            /*
            |--------------------------------------------------------------------------
            | SIMPAN PAS FOTO
            |--------------------------------------------------------------------------
            */

            $pasFoto = null;

            if ($request->hasFile('pas_foto')) {

                $pasFoto = $request
                    ->file('pas_foto')
                    ->store(
                        'dokumen/foto',
                        'public'
                    );

                $uploadedFiles[] = $pasFoto;
            }


            /*
            |--------------------------------------------------------------------------
            | BUAT PENDAFTARAN
            |--------------------------------------------------------------------------
            */

            $pendaftaran = Pendaftaran::create([
                'orang_tua_id' =>
                $orangTua->id,

                'nomor_pendaftaran' =>
                'TEMP-' . now()->format('YmdHis'),

                'nama_lengkap' =>
                $anak['nama_lengkap'],

                'tempat_lahir' =>
                $anak['tempat_lahir'],

                'tanggal_lahir' =>
                $anak['tanggal_lahir'],

                'jenis_kelamin' =>
                $anak['jenis_kelamin'],

                'nama_ayah' =>
                $anak['nama_ayah'],

                'nama_ibu' =>
                $anak['nama_ibu'],

                'nomor_hp' =>
                $ortu['no_hp'],

                'alamat' =>
                $ortu['alamat'],

                'akta_kelahiran' =>
                $akta,

                'kartu_keluarga' =>
                $kk,

                'ktp_orang_tua' =>
                $ktp,

                'ijazah_paud' =>
                $ijazah,

                'pas_foto' =>
                $pasFoto,

                'status' =>
                'Menunggu',
            ]);


            /*
            |--------------------------------------------------------------------------
            | NOMOR PENDAFTARAN
            |--------------------------------------------------------------------------
            */

            $nomor =
                'PPDB-' .
                now()->format('Ymd') .
                '-' .
                str_pad(
                    $pendaftaran->id,
                    4,
                    '0',
                    STR_PAD_LEFT
                );

            $pendaftaran->update([
                'nomor_pendaftaran' =>
                $nomor,
            ]);


            DB::commit();
        } catch (\Throwable $e) {

            DB::rollBack();

            foreach ($uploadedFiles as $file) {

                if (
                    $file &&
                    Storage::disk('public')->exists($file)
                ) {
                    Storage::disk('public')->delete($file);
                }
            }

            Log::error(
                'Gagal menyimpan pendaftaran PPDB.',
                [
                    'message' =>
                    $e->getMessage(),

                    'file' =>
                    $e->getFile(),

                    'line' =>
                    $e->getLine(),
                ]
            );

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Pendaftaran gagal disimpan. Silakan periksa kembali data dan dokumen.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | KIRIM EMAIL
        |--------------------------------------------------------------------------
        */

        try {

            Mail::to($orangTua->email)
                ->send(
                    new AkunPPDBMail(
                        $orangTua,
                        $passwordAsli
                    )
                );

            Mail::to($orangTua->email)
                ->send(
                    new PendaftaranPPDBMail(
                        $pendaftaran->load('orangTua')
                    )
                );
        } catch (\Throwable $e) {

            Log::error(
                'Pendaftaran berhasil tetapi email gagal dikirim.',
                [
                    'email' =>
                    $orangTua->email,

                    'nomor_pendaftaran' =>
                    $pendaftaran->nomor_pendaftaran,

                    'message' =>
                    $e->getMessage(),
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION
        |--------------------------------------------------------------------------
        */

        session()->forget([
            'orang_tua',
            'anak',
        ]);


        /*
        |--------------------------------------------------------------------------
        | BUKTI PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'ppdb.bukti',
                $pendaftaran->id
            )
            ->with(
                'success',
                'Pendaftaran berhasil disimpan. Informasi akun telah diproses untuk dikirim ke email Anda.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | BUKTI PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function bukti($id)
    {
        $pendaftaran = Pendaftaran::with('orangTua')
            ->findOrFail($id);

        return view(
            'ppdb.bukti',
            compact('pendaftaran')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD PDF
    |--------------------------------------------------------------------------
    */

    public function downloadPdf($id)
    {
        $pendaftaran = Pendaftaran::with('orangTua')
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'ppdb.bukti',
            compact('pendaftaran')
        );

        return $pdf->download(
            'Bukti-Pendaftaran-' .
                $pendaftaran->nomor_pendaftaran .
                '.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DATA PENDAFTARAN
    |--------------------------------------------------------------------------
    */

    public function indexAdmin()
    {
        $pendaftaran = Pendaftaran::with('orangTua')
            ->latest()
            ->get();

        return view(
            'admin.pendaftaran.index',
            compact('pendaftaran')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - DETAIL
    |--------------------------------------------------------------------------
    */

    public function showAdmin($id)
    {
        $pendaftaran = Pendaftaran::with('orangTua')
            ->findOrFail($id);

        return view(
            'admin.pendaftaran.show',
            compact('pendaftaran')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - EDIT
    |--------------------------------------------------------------------------
    */

    public function editAdmin($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        return view(
            'admin.pendaftaran.edit',
            compact('pendaftaran')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    public function updateAdmin(
        Request $request,
        $id
    ) {
        $request->validate(
            [
                'status' =>
                'required|in:Menunggu,Diterima,Ditolak',
            ],
            [
                'status.required' =>
                'Status pendaftaran wajib dipilih.',

                'status.in' =>
                'Status pendaftaran tidak valid.',
            ]
        );

        $pendaftaran = Pendaftaran::with('orangTua')
            ->findOrFail($id);

        $statusLama =
            $pendaftaran->status;

        $pendaftaran->update([
            'status' =>
            $request->status,
        ]);


        /*
        |--------------------------------------------------------------------------
        | EMAIL STATUS
        |--------------------------------------------------------------------------
        */

        if (
            $pendaftaran->orangTua &&
            !empty($pendaftaran->orangTua->email)
        ) {

            try {

                Mail::to(
                    $pendaftaran->orangTua->email
                )->send(
                    new StatusPPDBMail(
                        $pendaftaran->fresh('orangTua'),
                        $statusLama
                    )
                );
            } catch (\Throwable $e) {

                Log::error(
                    'Status PPDB berhasil diperbarui tetapi email gagal dikirim.',
                    [
                        'email' =>
                        $pendaftaran->orangTua->email,

                        'nomor_pendaftaran' =>
                        $pendaftaran->nomor_pendaftaran,

                        'message' =>
                        $e->getMessage(),
                    ]
                );
            }
        }


        return redirect()
            ->route(
                'admin.pendaftaran.index'
            )
            ->with(
                'success',
                'Status pendaftaran berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN - HAPUS
    |--------------------------------------------------------------------------
    */

    public function destroyAdmin($id)
    {
        $pendaftaran =
            Pendaftaran::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS FILE
        |--------------------------------------------------------------------------
        */

        $files = [
            $pendaftaran->akta_kelahiran,
            $pendaftaran->kartu_keluarga,
            $pendaftaran->ktp_orang_tua,
            $pendaftaran->ijazah_paud,
            $pendaftaran->pas_foto,
        ];

        foreach ($files as $file) {

            if (
                $file &&
                Storage::disk('public')->exists($file)
            ) {
                Storage::disk('public')->delete($file);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        $orangTuaId =
            $pendaftaran->orang_tua_id;

        $pendaftaran->delete();


        /*
        |--------------------------------------------------------------------------
        | HAPUS AKUN ORANG TUA
        |--------------------------------------------------------------------------
        */

        if ($orangTuaId) {

            OrangTua::where(
                'id',
                $orangTuaId
            )->delete();
        }


        return redirect()
            ->route(
                'admin.pendaftaran.index'
            )
            ->with(
                'success',
                'Data pendaftaran berhasil dihapus.'
            );
    }
}
