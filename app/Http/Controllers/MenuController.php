<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        $menu = Menu::simplePaginate(5);
        $data['menu'] = $menu;
        return view('admin.menu', $data );
    }
    public function showUserMenu()
    {
        $menu = Menu::all();
        return view('user.menumakan',compact('menu'));
    }

    public function create()
    {
        return view('admin.menu-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'makanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->storeAs('public/images', $imageName);

        Menu::create([
            'makanan' => $request->makanan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => 'images/'.$imageName,
        ]);
 

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('admin.menu-edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'makanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Menu::find($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($menu->gambar && Storage::exists('public/' . $menu->gambar)) {
                Storage::delete('public/' . $menu->gambar);
            }

            // Simpan gambar baru
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->storeAs('public/images', $imageName);
            $menu->gambar = 'images/'.$imageName;
        }

        $menu->makanan = $request->makanan;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        // Hapus gambar
        if ($menu->gambar && Storage::exists('public/' . $menu->gambar)) {
            Storage::delete('public/' . $menu->gambar);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    }


    
}
