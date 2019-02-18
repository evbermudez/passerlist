<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Passer;
use App\Http\Resources\Passer as PasserResource;

class PasserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get passers
        $passers = Passer::orderBy('examinee','asc')->paginate(50);

        //return collection of passers as a resource
        return PasserResource::collection($passers);
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
        //
        // $passer = $request->isMethod('put') ? Passer::findOrFail($request->passer_id) :
        //new Passer;
        
        //add ONLY
        $passer = new Passer;

        $passer->examinee = $request->input('examinee');
        $passer->eligibility = $request->input('eligibility');
        $passer->school = $request->input('school');
        $passer->division = $request->input('division');

        if($passer->save()){
            return new PasserResource($passer);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($keyword, $filter)
    {
        //
        // $passer = Passer::findOrFail($id);
        $passers;
        switch($filter){
            case 'examinee':
                $passers = Passer::where('examinee', 'like', "%{$keyword}%")->paginate(50);
            break;
            case 'eligibility':
                $passers = Passer::where('eligibility', 'like', "%{$keyword}%")->paginate(50);
            break;
            case 'school':
                $passers = Passer::where('school', 'like', "%{$keyword}%")->paginate(50);
            break;
            case 'division':
                $passers = Passer::where('division', 'like', "%{$keyword}%")->paginate(50);
            break;
        }

        return PasserResource::collection($passers);


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

    public function summary(){


        // $passers = DB::table('passers')
        //          ->select('school', DB::raw('count(*) as total'))
        //          ->groupBy('school')
        //          ->orderBy('total', 'asc')
        //          ->get();

        $passers = Passer::groupBy('school')
        ->orderBy('total','desc')
        ->selectRaw('school, count(*) as total')
        ->get();

        return $passers;
        
        
    }



    
}
