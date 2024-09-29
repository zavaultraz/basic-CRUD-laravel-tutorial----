<?php

namespace App\Http\Controllers\admin;

use App\Models\news;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'News - index';
        // get data baru terbaru darii tabel news
        $news = news::latest()->paginate(5);  // mengambil semua isi tabel news dan diurutkan secara latest (terbaru)
        $category = category::all();   // menampilkan semua data yang ada didalam table category
        //mengurutkan data berdasarkan data terbaru

        return view('admin.news.index', compact('title', 'news', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "News - index";
        //model category
        $category = category::all();
        return view('admin.news.create', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'title' => 'required|min:1|max:100',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3999'
        ]);
        // upload img
        $image = $request->file('image');
        //kedalam folder public/news
        // fungsi hasName bikin random nama file
        // Store image
        $image->storeAs('news', $image->hashName(), 'public'); // Tambahkan 'public' sebagai disk

        //create data kedalam table news
        news::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $image->hashName(),
            'slug' => Str::slug($request->title),
        ]);
        return redirect()->route('news.index')->with('success', 'Mantap Berita Berhasil Di Tambahkan! 👍');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Show - News";
        $news = news::findOrFail($id);
        return view('admin.news.show', compact('title', 'news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = news::findOrFail($id);
        $category = category::all();
        $title = 'Edit Data Berita';
        return view('admin.news.edit', compact('title', 'news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:6000'
        ]);
        // get data by id
        $news =  News::findOrFail($id);
        //jika tidak ada img yg di upload
        if ($request->file('image') == "") {
            //update
            $news->update([
                'title'       =>   $request->title,
                'content'     =>   $request->content,
                'slug'        =>   Str::slug($request->title),
                'category_id' =>   $request->category_id
            ]);
        } else {
            //hapus old image dulu
            Storage::disk('public')->delete('news/' . basename($news->image));
            //upload new image
            $image = $request->file('image');
            $image->storeAs('news', $image->hashName(), 'public'); // Tambahkan 'public' sebagai disk
            //update     dengan image baru
            $news->update([
                'title'      =>  $request->title,
                'content'    =>  $request->content,
                'image'      =>  $image->hashName(),
                'slug'       =>  Str::slug($request->title),
                'category_id' =>  $request->category_id
            ]);
        }
        return redirect()->route('news.index')->with(['success' => 'Berhasil Mengubah Data 🫡']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data by id
        $news = news::findOrFail($id);
        Storage::disk('local')->delete("public/news/" . basename($news->image));
        //delate data
        $news->delete();

        return redirect()->route('news.index')->with(['success' => 'Berhasil  Di Hapus 🧹']);
    }
}
