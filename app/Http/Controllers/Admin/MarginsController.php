<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Margin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarginsController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:admin-panel');

    }

//    function getMargin(float $price)
//    {
//        return $this->margins->where([
//            ['start', '<', $price],
//            ['end', '>', $price]
//        ])->get('margins');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

            $validate = $request->validate([
                'start' => 'required|regex:/^\d*(\.\d{2})?$/',
                'end' => 'required|regex:/^\d*(\.\d{2})?$/',
                'margin' => 'required|regex:/^\d*(\.\d{2})?$/',
            ]);
            Margin::create($validate);



        return redirect()->back()->with('info', 'Сохранил');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * return App\Entity\Margin;
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $margins = Margin::all();
        return view('admin.margins.edit', compact('margins'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id;
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {


        try {
            $validate = $request->validate([
                'start' => 'required|regex:/^\d*(\.\d{2})?$/',
                'end' => 'required|regex:/^\d*(\.\d{2})?$/',
                'margin' => 'required|regex:/^\d*(\.\d{2})?$/',
            ]);
            Margin::where('id', $id)->update($validate);
        } catch (\Exception  $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->back();
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
