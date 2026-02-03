<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function pageindex()
    {
        $galleries = Gallery::latest()->get(); // Asumsi Model bernama Gallery
        return view('page.gallery', compact('galleries'));
    }
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'category' => 'required|string|max:255',
            'activity_name' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Gallery::create([
            'image_path' => $path,
            'category' => $request->category,
            'activity_name' => $request->activity_name,
        ]);

        return redirect()->route('gallery.index');
    }

    public function dashbord()
    {
        // 1. Ambil semua data galeri (untuk ditampilkan di tabel)
        $galleries = Gallery::latest()->get();

        // 2. Hitung jumlah foto per kategori
        $categoryCounts = Gallery::select('category', DB::raw('count(*) as count'))
                                 ->groupBy('category')
                                 ->get();

        // Definisikan semua kategori yang mungkin (agar kategori kosong tetap muncul jika perlu)
        $allCategories = ['humas', 'kerjasama', 'ormawa', 'himpunan_prestasi', 'pmb'];
        
        $stats = [];
        foreach ($allCategories as $cat) {
            $count = $categoryCounts->where('category', $cat)->first();
            $stats[$cat] = $count ? $count->count : 0;
        }
        
        // Jika Anda ingin memastikan format yang rapi untuk view
        $categoryStats = collect($stats)->map(function($count, $category) {
            return [
                'name' => ucfirst(str_replace('_', ' ', $category)),
                'count' => $count,
                'key' => $category
            ];
        })->values(); // Mengubah menjadi array berindeks jika perlu

        return view('admin.index', compact('galleries', 'categoryStats'));
    }
    public function dashbordMahasiswa()
    {
        // 1. Ambil semua data galeri (untuk ditampilkan di tabel)
        $galleries = Gallery::latest()->get();

        // 2. Hitung jumlah foto per kategori
        $categoryCounts = Gallery::select('category', DB::raw('count(*) as count'))
                                 ->groupBy('category')
                                 ->get();

        // Definisikan semua kategori yang mungkin (agar kategori kosong tetap muncul jika perlu)
        $allCategories = ['humas', 'kerjasama', 'ormawa', 'himpunan_prestasi', 'pmb'];
        
        $stats = [];
        foreach ($allCategories as $cat) {
            $count = $categoryCounts->where('category', $cat)->first();
            $stats[$cat] = $count ? $count->count : 0;
        }
        
        // Jika Anda ingin memastikan format yang rapi untuk view
        $categoryStats = collect($stats)->map(function($count, $category) {
            return [
                'name' => ucfirst(str_replace('_', ' ', $category)),
                'count' => $count,
                'key' => $category
            ];
        })->values(); // Mengubah menjadi array berindeks jika perlu

        return view('admin.user', compact('galleries', 'categoryStats'));
    }
}
