<?php

namespace App\Http\Controllers\admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Category - index';
        //mengurutkan data berdasarkan data terbaru
        $category = category::Latest()->paginate(5);
        return view('admin.category.index', compact('category', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Category - Create';
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:220',
        ]);
    // 
    //
        //melakkukan save to database
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            
        ]);
        //melakukan return redirect
        return redirect()->route('category.index')->with('success', 'Mantap data Berhasil Di Tambahkan! 👍');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Category - edit';
        $category = Category::findOrFail($id);
        return view('category.edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|max:220',
        ]);
        // get data by id
        $category = Category::findOrFail($id);
        
        {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
            return redirect()->route('category.index')->with(['success' => 'Title berhasil di ubah😁']);
        }
        return redirect()->route('category.index')->with(['success' => 'Data telah diubah 😙']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get data by id
         $category = Category::findOrFail($id);
         $category->delete();
         //redirect
         return redirect()->route('category.index')->with(['success' => 'Data telah dihapus 👋']);
    }
}
