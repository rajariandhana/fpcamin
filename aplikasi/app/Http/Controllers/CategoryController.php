<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories',[
            'namaHalaman'=>'categories',
            'categories'=>Category::all()
            // 'daftarmenu'=>Category::tipe()
        ]);
    }
    public static function semuakat($namaHalaman,$menus, $category)
    {
        return view('category',[
            'namaHalaman'=>$namaHalaman,
            'menus'=>$menus,
            'category'=>$category
        ]);
    }

    public function edit($id)
    {
        return view('editcategory',[
            'namaHalaman'=>'Edit',
            'category'=>Category::findorfail($id)
        ]);
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama tidak boleh kosong',
        ]);
        Category::create([
            'nama'=>$request->nama,
            'slug'=>$request->nama,
        ]);
        return redirect('/menus');
    }
    
    public function update_category(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama tidak boleh kosong',
        ]);
        $category = Category::findorfail($id);
        $new_data = [
            'nama'=>$request->nama,
            'slug'=>$request->nama,
        ];
        $category->update($new_data);
        return redirect('/menus');
    }
    public function delete_category($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        return redirect('/menus');
    }
}