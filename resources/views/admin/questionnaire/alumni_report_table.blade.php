@extends('layouts.app') {{-- Ganti dengan layout admin Anda jika berbeda --}}

@section('content')
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-2">Laporan Kuisioner Alumni</h1>

        {{-- Tabel Data Ringkas --}}
        <div class="overflow-x-auto bg-white shadow-xl rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Alumni</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instansi Kerja</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji Utama (Rp)</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status Kerja</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Isi</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($reportData as $index => $row)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $row['NIM'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-800">{{ $row['Nama'] }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $row['Instansi Kerja'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-green-700 font-semibold">{{ $row['Gaji Utama'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">{{ $row['Status Kerja'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $row['Tanggal Isi'] }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-center">
                                <button 
                                    type="button" 
                                    class="text-indigo-600 hover:text-indigo-900 text-sm font-medium"
                                    data-questionnaire-data="{{ $row['full_questionnaire_data'] }}"
                                    onclick="loadQuestionnaireDetail(this)" 
                                >
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">Belum ada data kuesioner yang terkirim.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MODAL DETAIL MURNI TAILWIND CSS --}}
        <div id="detailModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
            
            {{-- Background Overlay --}}
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>

            {{-- Modal Panel --}}
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:w-full sm:max-w-4xl">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                
                <div class="flex justify-between items-center border-b pb-3 mb-3">
                    <h5 class="text-xl font-bold text-indigo-700" id="modalTitle">Detail Kuesioner Alumni</h5>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeModal()">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
                
                <div id="modalContent">
                    {{-- Data detail akan di-inject di sini oleh JavaScript --}}
                </div>

              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-600 text-base font-medium text-white hover:bg-gray-700 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">
                  Tutup
                </button>
              </div>
            </div>
          </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    const detailModal = document.getElementById('detailModal');
    const modalBody = document.getElementById('modalContent');

    function closeModal() {
        detailModal.classList.add('hidden');
        modalBody.innerHTML = ''; // Kosongkan konten saat ditutup
    }

    function openModal() {
        detailModal.classList.remove('hidden');
    }

    function loadQuestionnaireDetail(button) {
        try {
            const jsonData = button.getAttribute('data-questionnaire-data');
            const data = JSON.parse(jsonData);
            
            if (!data || Object.keys(data).length === 0) {
                modalBody.innerHTML = '<p class="text-red-500">Data kuesioner tidak ditemukan atau kosong.</p>';
                openModal();
                return;
            }

            // --- 1. Tampilkan Informasi Dasar Alumni (User/Profile) ---
            let html = '<h5 class="text-lg font-bold mb-2 text-indigo-700">Informasi Dasar Alumni</h5>';
            html += '<div class="p-3 mb-4 bg-indigo-50 rounded shadow-sm grid grid-cols-2 gap-2 text-sm">';
            
            // Data yang kita tambahkan di Controller
            html += `<p><strong>Nama:</strong> ${data.Nama || 'N/A'}</p>`;
            html += `<p><strong>Email:</strong> ${data.Email || 'N/A'}</p>`;
            html += `<p><strong>NIM:</strong> ${data.NIM || 'N/A'}</p>`;
            html += `<p><strong>Prodi:</strong> ${data.Prodi || 'N/A'}</p>`;
            html += '</div>';

            // --- 2. Detail Jawaban Kuesioner ---
            html += '<h5 class="text-lg font-bold mb-2 mt-4">Jawaban Kuisioner:</h5>';
            html += '<dl class="space-y-2 p-3 border rounded">';

            // Urutan kolom yang akan ditampilkan sesuai skema database
            const fieldOrder = [
                'Tanggal Isi', 'masa_kerja', 'masa_tunggu', 'gaji_utama', 'gaji_lembur', 'gaji_lainnya',
                'sumber_dana', 'status_bekerja', 'keterangan_pekerjaan', 'hubungan_studi', 
                'tingkat_pendidikan_sesuai', 'pendapatan_utama', 'pendapatan_lembur', 'pendapatan_lainnya',
                'provinsi_kerja', 'kabupaten_kerja', 'instansi_kerja', 'waktu_kerja_detail'
            ];
            
            for (const key of fieldOrder) {
                if (data.hasOwnProperty(key)) {
                    let displayKey = key.replace(/_/g, ' ');
                    displayKey = displayKey.charAt(0).toUpperCase() + displayKey.slice(1);
                    
                    let displayValue = data[key] === null || data[key] === "" ? 'Tidak Diisi' : data[key];

                    // Formatting Gaji/Pendapatan
                    const numericKeys = ['gaji_utama', 'pendapatan_utama', 'pendapatan_lembur', 'pendapatan_lainnya'];
                    if (numericKeys.includes(key) && typeof data[key] === 'number' && data[key] > 0) {
                         // Format Rupiah
                         displayValue = new Intl.NumberFormat('id-ID', { minimumFractionDigits: 0 }).format(data[key]);
                    }

                    html += `<div class="flex border-b pb-1">`;
                    html += `<dt class="w-1/2 text-sm font-medium text-gray-700">${displayKey}:</dt>`;
                    html += `<dd class="w-1/2 text-sm text-gray-900 text-right">${displayValue}</dd>`;
                    html += `</div>`;
                }
            }
            
            html += '</dl>';
            
            modalBody.innerHTML = html;
            openModal();

        } catch (e) {
            console.error("Error loading detail:", e);
            modalBody.innerHTML = '<p class="text-red-500">Terjadi kesalahan saat memuat detail.</p>';
            openModal();
        }
    }

    // Event listener untuk semua tombol detail agar modal terbuka
    document.addEventListener('DOMContentLoaded', function() {
        const detailButtons = document.querySelectorAll('[data-questionnaire-data]');
        
        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                loadQuestionnaireDetail(this);
            });
        });
    });
</script>
@endpush