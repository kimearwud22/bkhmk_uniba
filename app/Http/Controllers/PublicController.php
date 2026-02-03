<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicController extends Controller
{
    public function showBkhmkHumas()
    {
        // Data untuk Humas
        $humasPhotos = Gallery::where('category', 'humas')->latest()->take(8)->get();
        $humasCount = Gallery::where('category', 'humas')->count();

        // Data untuk Kerjasama
        $kerjasamaPhotos = Gallery::where('category', 'kerjasama')->latest()->take(8)->get();
        $kerjasamaCount = Gallery::where('category', 'kerjasama')->count();

        $headerTitle = "Galeri Publikasi & Kerjasama";
        $subheaderTitle = "Dokumentasi dari Biro Kerjasama dan Humas";

        return view('page.humas', compact(
            'humasPhotos',
            'kerjasamaPhotos',
            'humasCount',
            'kerjasamaCount',
            'headerTitle',
            'subheaderTitle'
        ));
    }

    // public function showBkhmkOrganization()
    // {
    //     // Ambil data untuk Ormawa, UKM, Himpunan
    //     $ormawaPhotos = Gallery::where('category', 'ormawa')->latest()->get();
    //     $ormawaCount = $ormawaPhotos->count();

    //     $ukmPhotos = Gallery::where('category', 'ukm')->latest()->get();
    //     $ukmCount = $ukmPhotos->count();

    //     $himpunanPhotos = Gallery::where('category', 'himpunan')->latest()->get();
    //     $himpunanCount = $himpunanPhotos->count();

    //     $headerTitle = "Galeri Kegiatan Mahasiswa";
    //     $subheaderTitle = "Dokumentasi Ormawa, UKM, dan Himpunan Prestasi.";

    //     return view('page.mahasiswa', compact(
    //         'ormawaPhotos',
    //         'ormawaCount',
    //         'ukmPhotos',
    //         'ukmCount',
    //         'himpunanPhotos',
    //         'himpunanCount',
    //         'headerTitle',
    //         'subheaderTitle'
    //     ));
    // }

    public function showBkhmkOrganization()
    {
        // Daftar UKM dan Himpunan
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

        // Ambil data untuk Ormawa, UKM, Himpunan
        $ormawaPhotos = Gallery::where('category', 'ormawa')->latest()->get();
        $ormawaCount = $ormawaPhotos->count();

        $ukmPhotos = Gallery::where('category', 'ukm')->latest()->get();
        $ukmCount = $ukmPhotos->count();

        $himpunanPhotos = Gallery::where('category', 'himpunan')->latest()->get();
        $himpunanCount = $himpunanPhotos->count();

        // Kategorikan foto berdasarkan UKM dan Himpunan
        $ukmPhotosByCategory = [];
        foreach ($ukmList as $ukm) {
            $ukmPhotosByCategory[$ukm] = Gallery::where('category', 'ukm-' . Str::slug($ukm))->get();
        }

        $himpunanPhotosByCategory = [];
        foreach ($himpunanList as $himpunan) {
            $himpunanPhotosByCategory[$himpunan] = Gallery::where('category', 'himpunan-' . Str::slug($himpunan))->get();
        }

        // Judul halaman
        $headerTitle = "Galeri Kegiatan Mahasiswa";
        $subheaderTitle = "Dokumentasi Ormawa, UKM, dan Himpunan Prestasi.";

        // Kirim data ke view
        return view('page.mahasiswa', compact(
            'ormawaPhotos',
            'ormawaCount',
            'ukmPhotos',
            'ukmCount',
            'himpunanPhotos',
            'himpunanCount',
            'headerTitle',
            'subheaderTitle',
            'ukmList',
            'himpunanList',
            'ukmPhotosByCategory',
            'himpunanPhotosByCategory'
        ));
    }

    public function showBkhmkPrestasi()
    {
        // Ambil data untuk Ormawa, UKM, Himpunan
        $prestasiPhotos = Gallery::where('category', 'ormawa')->latest()->get();
        $prestasiCount = $prestasiPhotos->count();

        $headerTitle = "Galeri Prestasi Mahasiswa";
        $subheaderTitle = "Dokumentasi Lomba, Kejuaraan, dan Mahasiswa Berprestasi.";

        return view('page.prestasi', compact(
            'prestasiPhotos',
            'prestasiCount',
            'headerTitle',
            'subheaderTitle'
        ));
    }
    public function showBkhmkLayanan()
    {
        // Ambil data untuk Ormawa, UKM, Himpunan
        $prestasiPhotos = Gallery::where('category', 'layanan-karir-kesehatan')->latest()->get();
        $prestasiCount = $prestasiPhotos->count();

        $headerTitle = "Layanan Karir dan Kesehatan Mahasiswa";
        $subheaderTitle = "Dokumentasi Layanan Karir dan Kesehatan Mahasiswa.";

        return view('page.layanan-karir-kesehatan', compact(
            'prestasiPhotos',
            'prestasiCount',
            'headerTitle',
            'subheaderTitle'
        ));
    }
}
