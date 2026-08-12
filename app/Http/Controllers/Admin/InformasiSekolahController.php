<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InformasiSekolahMail;
use App\Models\InformasiSekolah;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InformasiSekolahController extends Controller
{
    /**
     * Menampilkan daftar informasi sekolah.
     */
    public function index()
    {
        $informasi = InformasiSekolah::latest()->get();

        return view(
            'admin.informasi-sekolah.index',
            compact('informasi')
        );
    }


    /**
     * Menampilkan form tambah informasi.
     */
    public function create()
    {
        return view('admin.informasi-sekolah.create');
    }


    /**
     * Menyimpan informasi sekolah dan mengirim email
     * kepada seluruh orang tua yang memiliki email.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'isi' => [
                'required',
                'string',
            ],

            'penerima' => [
                'required',
                'in:semua',
            ],
        ]);


        // Simpan informasi sekolah ke database
        $informasi = InformasiSekolah::create([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'penerima' => $validated['penerima'],
        ]);


        // Ambil semua orang tua yang memiliki email
        $orangTua = OrangTua::query()
            ->whereNotNull('email')
            ->where('email', '!=', '')
            ->get();


        // Kirim email kepada setiap orang tua
        foreach ($orangTua as $orang) {

            Mail::to($orang->email)
                ->send(
                    new InformasiSekolahMail($informasi)
                );
        }


        return redirect()
            ->route('admin.informasi.index')
            ->with(
                'success',
                'Informasi sekolah berhasil disimpan dan dikirim ke email orang tua.'
            );
    }


    /**
     * Menampilkan detail informasi sekolah.
     */
    public function show($id)
    {
        $informasi = InformasiSekolah::findOrFail($id);

        return view(
            'admin.informasi-sekolah.show',
            compact('informasi')
        );
    }


    /**
     * Menampilkan form edit informasi sekolah.
     */
    public function edit($id)
    {
        $informasi = InformasiSekolah::findOrFail($id);

        return view(
            'admin.informasi-sekolah.edit',
            compact('informasi')
        );
    }


    /**
     * Memperbarui informasi sekolah.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'isi' => [
                'required',
                'string',
            ],

            'penerima' => [
                'required',
                'in:semua',
            ],
        ]);


        $informasi = InformasiSekolah::findOrFail($id);


        $informasi->update([
            'judul' => $validated['judul'],
            'isi' => $validated['isi'],
            'penerima' => $validated['penerima'],
        ]);


        return redirect()
            ->route('admin.informasi.index')
            ->with(
                'success',
                'Informasi sekolah berhasil diperbarui.'
            );
    }


    /**
     * Menghapus informasi sekolah.
     */
    public function destroy($id)
    {
        $informasi = InformasiSekolah::findOrFail($id);

        $informasi->delete();

        return redirect()
            ->route('admin.informasi.index')
            ->with(
                'success',
                'Informasi sekolah berhasil dihapus.'
            );
    }
}
