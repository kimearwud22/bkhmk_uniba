<?php

namespace App\Http\Controllers;

use App\Models\AlumniQuestionnaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class QuestionnaireController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        if ($user instanceof \Illuminate\Database\Eloquent\Model) {
            $user->load('profile');
        }

        $existingAnswer = AlumniQuestionnaire::where('user_id', $user->id)->first();
        
        $questionnaireData = [];
        $isEditing = false;

        if ($existingAnswer) {
            $isEditing = true;
            // Ubah array data lama menjadi format yang mudah dibaca oleh View Blade
            $questionnaireData = $existingAnswer->toArray(); 

            // --- LOGIKA REKONSTRUKSI UNTUK WAKTU KERJA (Agar muncul di Radio + Input) ---
            $waktuKerja = $existingAnswer->waktu_kerja_detail;
            if ($waktuKerja) {
                if (strpos($waktuKerja, 'bulan sebelum lulus') !== false) {
                    $questionnaireData['waktu_kerja_periode'] = 'Sebelum';
                    $questionnaireData['waktu_kerja_sebelum'] = (int) filter_var($waktuKerja, FILTER_SANITIZE_NUMBER_INT);
                } elseif (strpos($waktuKerja, 'bulan setelah lulus') !== false) {
                    $questionnaireData['waktu_kerja_periode'] = 'Sesudah';
                    $questionnaireData['waktu_kerja_sesudah'] = (int) filter_var($waktuKerja, FILTER_SANITIZE_NUMBER_INT);
                }
            }

            // --- LOGIKA REKONSTRUKSI UNTUK SUMBER DANA (Jika ada teks "Lainnya:...") ---
            $dana = $existingAnswer->sumber_dana;
            if (strpos($dana, 'Lainnya:') !== false) {
                $questionnaireData['sumber_dana'] = 'Lainnya';
                $questionnaireData['sumber_dana_lainnya'] = trim(str_replace('Lainnya:', '', $dana));
            }

        } 
        
        return view('admin.questionnaire.fill', compact('user', 'questionnaireData', 'isEditing', 'existingAnswer'));
    }

    /**
     * Memproses submit/update kuesioner.
     */
    public function submitOrUpdate(Request $request)
    {
        $user = Auth::user();
        
        // --- VALIDASI KOMPLEKS ---
        $request->validate([
            // Data Teks/Angka
            'masa_kerja' => 'nullable|numeric|min:0',
            'masa_tunggu' => 'nullable|numeric|min:0',
            'provinsi_kerja' => 'nullable|string|max:100',
            'kabupaten_kerja' => 'nullable|string|max:100',
            'instansi_kerja' => 'nullable|string|max:255',
            
            'gaji_utama' => 'required|numeric|min:0',
            'gaji_lembur' => 'nullable|numeric|min:0',
            'gaji_lainnya' => 'nullable|numeric|min:0',

            // Radio & Select
            'waktu_kerja_periode' => ['required', Rule::in(['Sebelum', 'Sesudah'])],
            'waktu_kerja_sebelum' => 'required_if:waktu_kerja_periode,Sebelum|nullable|numeric|min:0',
            'waktu_kerja_sesudah' => 'required_if:waktu_kerja_periode,Sesudah|nullable|numeric|min:0',
            
            'sumber_dana' => ['required', Rule::in(['Biaya Sendiri/Keluarga', 'Beasiswa ADIK', 'Beasiswa BIDIKMISI', 'Beasiswa PPA', 'Beasiswa AFIRMASI', 'Beasiswa Perusahaan/Swasta', 'Lainnya'])],
            'sumber_dana_lainnya' => 'nullable|string|max:100',
            
            'status_bekerja' => ['required', Rule::in(['Ya', 'Tidak'])],
            'keterangan_pekerjaan' => 'nullable|string',
            
            'hubungan_studi' => ['required', Rule::in(['Sangat Erat', 'Erat', 'Cukup Erat', 'Kurang Erat', 'Tidak Sama Sekali'])],
            'tingkat_pendidikan_sesuai' => ['required', Rule::in(['Setingkat Lebih Tinggi', 'Tingkat Yang Sama', 'Setingkat Lebih Rendah', 'Tidak Perlu Pendidikan Tinggi'])],
            
            'pendapatan_utama' => 'required|numeric|min:0',
            'pendapatan_lembur' => 'nullable|numeric|min:0',
            'pendapatan_lainnya' => 'nullable|numeric|min:0',
        ]);

        // Rekonstruksi Data Waktu Kerja
        $waktuKerjaDetail = $request->waktu_kerja_periode == 'Sebelum' 
            ? $request->waktu_kerja_sebelum . ' bulan sebelum lulus'
            : $request->waktu_kerja_sesudah . ' bulan setelah lulus';

        // Rekonstruksi Sumber Dana
        $sumberDanaFinal = $request->sumber_dana;
        if ($request->sumber_dana == 'Lainnya' && $request->sumber_dana_lainnya) {
             $sumberDanaFinal = 'Lainnya: ' . $request->sumber_dana_lainnya;
        }
        
        $dataToStore = [
            'masa_kerja' => $request->masa_kerja,
            'masa_tunggu' => $request->masa_tunggu,
            'provinsi_kerja' => $request->provinsi_kerja,
            'kabupaten_kerja' => $request->kabupaten_kerja,
            'instansi_kerja' => $request->instansi_kerja,
            'gaji_utama' => $request->gaji_utama,
            'gaji_lembur' => $request->gaji_lembur,
            'gaji_lainnya' => $request->gaji_lainnya,
            'sumber_dana' => $sumberDanaFinal,
            'status_bekerja' => $request->status_bekerja,
            'keterangan_pekerjaan' => $request->keterangan_pekerjaan,
            'hubungan_studi' => $request->hubungan_studi,
            'tingkat_pendidikan_sesuai' => $request->tingkat_pendidikan_sesuai,
            'pendapatan_utama' => $request->pendapatan_utama,
            'pendapatan_lembur' => $request->pendapatan_lembur,
            'pendapatan_lainnya' => $request->pendapatan_lainnya,
            'waktu_kerja_detail' => $waktuKerjaDetail,
        ];
        
        // LOGIKA UPDATE/CREATE: Jika ada, update. Jika tidak ada, create.
        $existingAnswer = AlumniQuestionnaire::updateOrCreate(
            ['user_id' => $user->id], // Kunci pencarian
            $dataToStore // Data yang akan di-update/create
        );

        // Redirect kembali ke halaman kuesioner (untuk melihat data yang baru disimpan/diupdate)
        return redirect()->route('questionnaire.show1')->with('success', 'Kuesioner berhasil disimpan/diperbarui!');
    }

    public function reportAlumni()
    {
    $usersWithData = User::with(['profile', 'questionnaire'])
        ->whereHas('questionnaire') 
        ->get();
        
    $reportData = [];

    foreach ($usersWithData as $user) {
        $profile = $user->profile;
        $questionnaire = $user->questionnaire;

        // MEMBUAT DATA BASE UNTUK DIKIRIM KE VIEW
        $baseData = [
            'Tanggal Isi' => $questionnaire->created_at->format('d M Y H:i'),
            'Nama' => $user->name,
            'Email' => $user->email,
            'NIM' => $profile->nim ?? 'N/A',
            'Prodi' => $profile->prodi ?? 'N/A',
        ];
        
        // Menggabungkan data dasar dengan semua data kuesioner (yang sudah ada di $questionnaire)
        $fullDataForModal = array_merge(
            $baseData,
            $questionnaire->toArray()
        );

        $reportRow = [
            'user_id' => $user->id,
            'Tanggal Isi' => $baseData['Tanggal Isi'],
            'Nama' => $baseData['Nama'],
            'Email' => $baseData['Email'],
            'NIM' => $baseData['NIM'],
            'Prodi' => $baseData['Prodi'],
            
            // --- DATA RINGKAS UNTUK TABEL UTAMA ---
            'Instansi Kerja' => $questionnaire->instansi_kerja ?? 'N/A',
            'Gaji Utama' => number_format($questionnaire->gaji_utama ?? 0, 0, ',', '.'),
            'Status Kerja' => $questionnaire->status_bekerja ?? 'N/A',
            'Hubungan Studi' => $questionnaire->hubungan_studi ?? 'N/A',
            
            // Kirim data lengkap ke JSON
            'full_questionnaire_data' => json_encode($fullDataForModal), 
        ];
        
        $reportData[] = $reportRow;
    }

    return view('admin.questionnaire.alumni_report_table', compact('reportData'));
}
}
