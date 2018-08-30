<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;
use File;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('upload')->with('categories',$categories);
    }

    public function upload(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'author'=>'required',
            'info'=>'required',
            'category'=>'required',
            'image'=>'required|image',
            'book'=>'required|mimes:pdf',
        ]);

        if ($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumnnail.'.$imageExt;
            $request->file('image')->move(public_path() . '/thumbnalis', $imageName);
        }

        if ($request->hasFile('book')){
            $bookExt = $request->file('book')->getClientOriginalExtension();
            $bookName = uniqid('book_').'.'.$bookExt;
            $request->file('book')->move(public_path("/books"), $bookName);
           $fsize= File::size(public_path("/books/$bookName"));
        }
        function formatBytes($bytes, $precision = 2) { 
            $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
        
            $bytes = max($bytes, 0); 
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
            $pow = min($pow, count($units) - 1); 
        
            // Uncomment one of the following alternatives
            $bytes /= pow(1024, $pow);
            // $bytes /= (1 << (10 * $pow)); 
        
            return round($bytes, $precision) . ' ' . $units[$pow]; 
        } 
    
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->info = $request->input('info');
        $book->image = $imageName;
        $book->book = $bookName;
        $book->username=auth()->user()->username;
        $book->user_id = auth()->user()->id;
        $book->category_id = $request->input('category');
        $book->book_size=formatBytes($fsize);
        $book->book_type=$bookExt;
        $book->save();
        return redirect(route('upload'))->with('msg','سيتم الموافقة على طلبك قريباَ');

    }

    
}
