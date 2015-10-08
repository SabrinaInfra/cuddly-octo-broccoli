<?php
namespace series\Http\Controllers;
use Illuminate\Http\Request;
use series\Http\Requests;
use series\Http\Controllers\Controller;
use Illuminate\Validation\Factory;
use series\Genre;
use series\Series;
use series\Series_info;
use Redirect;
class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('list.series');
    }

      public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::lists('name', 'id');
        return view('create.serie')->with('genre', $genre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $serie = new Series;
      $serie->name = $request->name;
      $serie->photo = $request->photo;
      $serie_info = new Series_info;
      $serie_info->description = $request->description;
      $serie_info->genre = $request->genre;
      $serie_info->start = $request->start;
      $serie_info->finish = $request->finish;
      $serie->save();
      $serie_info->save();
      return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
