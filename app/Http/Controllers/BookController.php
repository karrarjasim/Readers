<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        $term=$request->term;
        $items=Book::where('title','LIKE','%'.$term.'%')->get();
        if (count($items)==0)
        {
          $searchresult[]="لا توجد نتائج";

        }
        else
        {
            foreach ($items as $item )
            {
                $searchresult[]=$item->title;
            }
        }
       return $searchresult;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function find()
    {
      return view('search');
    }

    public function bookview(Request $request)
    {
        $this->validate($request,[
            'search'=>'required'
            ]);

        $results=Book::where('title',$request->input('search'))->limit(1)->get();
        return view('search_result')->with('results',$results);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $one_books=DB::table('books')->where('id',$id)->get();
        $rand_book=DB::table('books')->inRandomOrder()->get();
        return view('book')->with(['one_books'=>$one_books,'rand_book'=>$rand_book]);
    }

    public function all_book()
    {
        $all_books=Book::all();
        return view('books')->with('all_books',$all_books);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
