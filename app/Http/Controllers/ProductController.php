<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Menampilkan halaman daftar produk
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Untuk sementara hanya menampilkan halaman
        return view('layout.pages.product.product');
    }

    /**
     * Menampilkan halaman form tambah produk
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('layout.pages.product.create-product');
    }

    /**
     * Menyimpan produk baru (hanya simulasi)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Simulasi validasi dan penyimpanan
        // Flash message untuk notifikasi
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit produk
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        // Simulasi menampilkan form edit
        return view('layout.pages.product.product-edit', ['id' => $id]);
    }

    /**
     * Update produk (hanya simulasi)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Simulasi validasi dan update
        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk (hanya simulasi)
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // Simulasi penghapusan
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}