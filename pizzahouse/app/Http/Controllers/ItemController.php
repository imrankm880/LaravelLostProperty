<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use App\lostitems;

class ItemController extends Controller
{

  public function index() {

    $lostitems = lostitems::latest()->get();

    return view('Items.index', [
      'lostitems' => $lostitems,
    ]);
  }


  public function report() {

return view('Items.reportItem');
  }

  public function create() {
    return view('Items.create');
  }


  public function store(Request $request) {

    $lostitems = new lostitems();
    $file_names = [];
    
    $lostitems->category = request('category');
    $lostitems->color = request('color');
    $lostitems->date = request('date');

    $lostitems->place = request('place');
    $lostitems->description = request('description');






        $lostitems->save();

        $item_data = $lostitems->toArray();

        if($request->hasFile('images')){
            $files = $request->file('images');
            //echo '<pre>'.print_r($files, true).'</pre>'; exit;
            for($i=0, $count = count($files); $i < $count; $i++){
                 $file_names[] = $this->upload($files[$i]);
            }
        }

        //echo '<pre>'.
       // print_r($item_data, true).
       // print_r($file_names, true).'</pre>'; exit;


        for($i=0, $count = count($file_names); $i < $count; $i++){
           // try{
                \DB::table('itemimages')->insert([
                    "item_id" => $item_data['id'],
                    "file_name" => $file_names[$i]
              ]);
         /*   }
            catch(\Exception $ex){
                die($ex->getMessage());
            }*/

        }


        return redirect()->route('item.show', ["id"=>$item_data['id']])->with('mssg', 'Thanks for your order!');

    /*}
    catch(\Exception $ex){
        die($ex->getMessage());
    }*/


  }



  public function show($id) {

    $lostitems = lostitems::findOrFail($id);

    $images = \DB::table('itemimages')->where("item_id", $id)->get()->toArray();

    return view('Items.detail', [
        'item' => $lostitems,
        "images" => $images
    ]);
  }





  public function destroy($id) {

    $lostitems = lostitems::findOrFail($id);
    $lostitems->delete();

    return redirect('/pizzas');

  }

  function upload($file, $entity = 'items'){

    $fileArray = array('image' => $file);

    // Tell the validator that this file should be an image
    $rules = array(
      'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
    );

    // Now pass the input and rules into the validator
    $validator = Validator::make($fileArray, $rules);

    // Check to see if validation fails or passes
    if ($validator->fails()){
        die("bad image format");
    }

    $name = $file->getClientOriginalName();

    $name = str_replace('.' . $file->getClientOriginalExtension(), '', $file->getClientOriginalName());

    $_name = preg_replace('#[^A-Za-z0-9_\-]#', '-', $name);

    $counter = '';

    $path = public_path() . '/img/' . $entity . '/';

    if( !file_exists($path) ){
        if( !\file_exists(public_path() . '/imgs/') ){
            mkdir(public_path() . '/img/');
        }

        mkdir($path);
    }



    do{

       $name = $_name . $counter . '.' . $file->getClientOriginalExtension();

       $counter = (int) $counter;

       $counter++;

    } while(file_exists( $path . $name));

    //$destinationPath = public_path() .  self::IMAGE_PATH;

    $isUploaded = $file->move($path, $name);

    return $name;

}

}
