<?php

namespace Spati\Http\Controllers;

use Illuminate\Http\Request;
use Spati\Http\Requests;
use Spati\Http\Controllers\Controller;
use Spati\Spati;

class SpatiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Spati::paginate($request->input('count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Spati::find($id);
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

    public function address($id)
    {
        return Spati::find($id)->address()->first();
    }

    public function contactInformation($id)
    {
        return Spati::find($id)->contactInformation()->first();
    }

    public function closest(Request $request)
    {
        $location = $request->input('location');

        list($latitude, $longitude) = explode(',', $location);

        dd(Spati::closest($latitude, $longitude));
    }
}
