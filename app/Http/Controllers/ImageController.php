<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image; 
use Illuminate\Support\Facades\Validator;
class ImageController extends Controller
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
        
        $validator = Validator::make($request->all(),[ 
            'file' => 'required|mimes:jpeg,png,jpg|max:2048',
      ]);   

      if($validator->fails()) {          
           
          return response()->json(['error'=>$validator->errors()], 401);                        
       }
      

        /*$request->validate([
         'file' => ['required', 'max:2042','mimes:jpeg,png,jpg']

       ]);*/
    
       if ($validator=$request->file('file')) {
        //$imagesName = $request->file('file')->store('public/files');
        $imagesName = $request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('public/files', $imagesName);
        $image = new Image();
        $image->file= $imagesName;
        $image->path=$path;
        $image->save();
           
        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "file" => $image
        ]);
         }else{
            return response()->json(["message"=> "Veillez choisir le bonne extension !",    'errors' =>$validator->errors()],401); 

         }
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
