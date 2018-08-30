<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;
class AdminUploaderController extends Controller
{
    public function index(){
        $books=Book::all();
        return view('admin.uploadReq')->with('books',$books);
    }
    public function assent($id){
        DB::table('books')
            ->where('id', $id)
            ->update(['book_status' => 1]);
        return redirect(route('uploadrequest'))->with('msg','تمت الموافقة');

    }

}
