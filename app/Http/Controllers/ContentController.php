<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Storage::get('saveFile.json');
        // $data = file_get_contents('storage/data.json');
        $json = json_decode($data,true);
        return view('welcome')->with('json',$json);
        // $blog = json_decode( Storage::get('saveFile.json'));
        
        // return view('welcome', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentData = Storage::get('saveFile.json');
        $arrayData = json_decode($currentData, true);
        $extra = $array = array(
            'title' => $_POST['title'],
            'text' => $_POST['text'], 
            'image'=>$_POST['image'],
            'author'=>$_POST['author']
        );
        $arrayData[] = $extra;
        $finalData = json_encode($arrayData);
        if(Storage::put('saveFile.json',$finalData)){
            echo 'success';
            return redirect('/');
        }

        
        // file_put_contents('saveFile.json',json_encode($data));

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
        $data = Storage::disk('local')->get('saveFile.json');
        $json = json_decode($data,true);
        $all = $json[$id];
        return view('edit',compact('all'));
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
        $data = Storage::disk('local')->get('saveFile.json');
        // $data = file_get_contents('storage/data.json');
        $json = json_decode($data,true);
        // $update = $request->only(['judul', 'author', 'content']);
        $title = $request->title;
        $author = $request->author;
        $content = $request->text;
        $image = $request->image;
        $json[$id]=array(
                'title'=> $title,
                'author'=> $author,
                'text' => $content,
                'image' => $image,

            );
        Storage::disk('local')->put('saveFile.json', json_encode($json, JSON_PRETTY_PRINT));
        return redirect('/')->with('berhasil','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $json = Storage::disk('local')->get('saveFile.json');
        $data= json_decode($json, true);
        array_splice($data,$id,1);
        $json=Storage::disk('local')->put('saveFile.json', json_encode($data, JSON_PRETTY_PRINT));
        return redirect('/');

        // $delede_id = $_GET['delete_id'];
        // $data = Storage::get('saveFile.json');
        // $data_decode = json_decode($data, true);
        // unset($data_decode[$delede_id]);
        // $data_decode = json_encode($data_decode);
        // $data_decode = Storage::put('saveFile.json', $data_decode);
    }


   
}
