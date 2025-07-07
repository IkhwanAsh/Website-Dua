<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MahasiswaController extends Controller
{
    private $nim = "23050748"; // Default NIM

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'profil', 'show']);
    }

    // Menampilkan daftar mahasiswa
    public function index()
{
    // Mengambil data mahasiswa berdasarkan NIM
    $hasil = $this->tarikDataIkraf(3, '23050748'); // Ganti dengan NIM yang diinginkan

    // Cek apakah hasil valid
    if ($hasil && $hasil['status']) {
        $nama = $hasil['data']['nama'];
        $nim = $hasil['data']['nim'];
        $foto = $hasil['data']['foto'] ?? asset('img/default-profile.jpg'); // Mengambil foto dari API atau menggunakan foto default
    } else {
        $nama = 'tidak konek API';
        $nim = 'tidak konek API';
        $foto = asset('img/default-profile.jpg'); // Menggunakan foto default jika API tidak dapat diakses
    }

    return view('mahasiswa', [
        'nama' => $nama,
        'nim' => $nim,
        'foto' => $foto // Pastikan foto dikirim ke view
    ]);
}

    // Menampilkan profil mahasiswa berdasarkan NIM
    public function show($nim)
    {
        // Mengambil data dari API
        $hasil = $this->tarikDataIkraf(3, $nim);

        // Jika data tidak ditemukan
        if (!$hasil || !isset($hasil['data'])) {
            return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan');
        }

        // Format data dari API
        $data = $hasil['data'];

        return view('mahasiswa.profil', [
            'nama' => $data['nama'] ?? 'Ikhwan Ashshafa',
            'nim' => $data['nim'] ?? $nim,
            'foto' => $data['foto'] ?? asset('profil.jpg'),
            'prodi' => $data['prodi'] ?? 'Teknik Informatika',
            'alamat' => $data['alamat'] ?? 'Jl. Contoh No. 123'
        ]);
    }

    // Fungsi untuk mengambil data dari API
    private function tarikDataIkraf($kelas, $nim)
    {
        // URL + query string
        $url  = 'https://ikraf.or.id/services/lms/tarik_data'
              . '?kelas=' . urlencode($kelas)
              . '&nim='   . urlencode($nim);

        // Basic-Auth (hard-code sesuai permintaan)
        $user = 'uym';
        $pass = 'ok123';

        // Siapkan cURL
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,           // respons → string
            CURLOPT_USERPWD        => $user . ':' . $pass,
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_TIMEOUT        => 10,             // detik
            CURLOPT_SSL_VERIFYPEER => true,           // false jika dev self-signed
        ));

        $result = curl_exec($ch);

        // Error jaringan
        if ($result === false) {
            Log::warning('IKRAF cURL error: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }

        // Periksa status HTTP
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status < 200 || $status >= 300) {
            Log::warning('IKRAF HTTP status: ' . $status);
            return null;
        }

        // Decode JSON → array asosiatif
        $data = json_decode($result, true);
        return is_array($data) ? $data : null;
    }
}
