@extends('layouts.app')

@section('content')
    <!-- Konten Halaman -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <h1 class="text-3xl font-bold text-gray-900 mb-6">Gallery Management</h1>

        <!-- Form Upload (Dibuat lebih rapi dengan Tailwind) -->
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow-md mb-8 border border-gray-100 flex flex-wrap items-center gap-4">
            @csrf

            <!-- Input File -->
            <div class="flex flex-col flex-grow min-w-[150px]">
                <label for="image_upload" class="text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
                <input type="file" name="image" id="image_upload" required
                    class="text-sm text-gray-500
                       file:mr-4 file:py-2 file:px-4
                       file:rounded-lg file:border-0
                       file:text-sm file:font-semibold
                       file:bg-indigo-50 file:text-indigo-700
                       hover:file:bg-indigo-100">
            </div>

            {{-- inputa activity name --}}
            <div class="flex flex-col flex-grow min-w-[150px]">
                <label for="activity_name" class="text-sm font-medium text-gray-700 mb-1">Nama Kegiatan (Opsional)</label>
                <input type="text" name="activity_name" id="activity_name" placeholder="Masukkan nama kegiatan"
                    class="block w-full bg-white border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>

            <!-- Dropdown Kategori -->
            {{-- <div class="flex flex-col min-w-[150px]">
                <label for="category_select" class="text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <div class="relative">
                    <select name="category" id="category_select" class="appearance-none block w-full bg-white border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        <option value="humas">Humas</option>
                        <option value="kerjasama">Kerjasama</option>
                        <option value="ormawa">Ormawa</option>
                        <option value="himpunan">Himpunan</option>
                        <option value="ukm">Ukm</option>
                        <option value="prestasi">Prestasi</option>
                        <option value="pmb">PMB</option>
                        <option value="layanan-karir-kesehatan">Layanan Karir & Kesehatan</option>
                    </select>
                    <!-- Custom Arrow -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.949L5.636 9.293a1 1 0 111.414-1.414L10 10.828l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                    </div>
                </div>
            </div> --}}
            @php
                // Data UKM (Jika tidak dikirim dari Controller)
                $ukmList = [
                    'Pramuka',
                    'Musik',
                    'Teater',
                    'Mapala',
                    'PSHT',
                    'Bola Voli',
                    'Bulu Tangkis',
                    'Futsal Massage',
                    'Ristek',
                    'Kerohanian',
                ];

                // Data Himpunan
                $himpunanList = [
                    'Himapora',
                    'ESA',
                    'Himatika',
                    'Himabikon',
                    'Himapijar',
                    'Himabioevergreen',
                    'HMM',
                    'HM Elektro',
                    'Himagihasta',
                    'Himariestech',
                    'Hima PPKN',
                    'HimaKi',
                ];
            @endphp

            <!-- Dropdown Kategori (Diperbarui dengan Optgroup) -->
            <div class="flex flex-col min-w-[150px]">
                <label for="category_select" class="text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <div class="relative">
                    <select name="category" id="category_select"
                        class="appearance-none block w-full bg-white border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">

                        {{-- Kategori Umum --}}
                        <option value="humas">Humas</option>
                        <option value="kerjasama">Kerjasama</option>
                        <option value="ormawa">Ormawa</option>
                        <option value="prestasi">Prestasi</option>
                        <option value="pmb">PMB</option>
                        <option value="layanan-karir-kesehatan">Layanan Karir & Kesehatan</option>

                        {{-- KATEGORI UKM (Menggunakan Optgroup) --}}
                        <optgroup label="UKM (Unit Kegiatan Mahasiswa)">
                            @foreach ($ukmList as $ukm)
                                <option value="ukm-{{ Str::slug($ukm) }}">{{ $ukm }}</option>
                            @endforeach
                        </optgroup>

                        {{-- KATEGORI HIMPUNAN (Menggunakan Optgroup) --}}
                        <optgroup label="Himpunan Mahasiswa">
                            @foreach ($himpunanList as $himpunan)
                                <option value="himpunan-{{ Str::slug($himpunan) }}">{{ $himpunan }}</option>
                            @endforeach
                        </optgroup>

                    </select>
                    <!-- Custom Arrow -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M9.293 12.949L5.636 9.293a1 1 0 111.414-1.414L10 10.828l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Tombol Upload -->
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-150 self-end min-w-[100px]">
                Upload
            </button>
        </form>

        <!-- Tabel Galeri (Pengganti Grid) -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Preview</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                                Kegiatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @forelse($galleries as $index => $gallery)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>

                                <!-- Preview Gambar (Dipersempit agar tabel tidak terlalu lebar) -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Gallery Image"
                                        class="w-20 h-20 object-cover rounded-md border">
                                </td>

                                <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">
                                    {{ basename($gallery->activity_name) }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ ucfirst($gallery->category) }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <!-- Tombol Aksi (Misalnya Delete) -->
                                    <button onclick="return confirm('Yakin ingin menghapus gambar ini?')"
                                        class="text-red-600 hover:text-red-900 ml-4">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">Belum ada gambar yang
                                    diunggah.</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
