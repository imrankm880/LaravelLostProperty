<?php

namespace App\Http\Controllers;

use App\itemimage;
use App\lostitems;
use App\Report;
use Illuminate\Http\Request;

class AdminItemsController extends Controller
{
    public function index()
    {

        $lostItem = lostitems::with(['user', 'lostimage'])->get();


        return view('admin.itemsList', compact('lostItem'));
    }


    public function reportList()
{

    $reportlist = report::with(['user', 'lostitem'])->where(['status'=>'1','reject'=>'1'])->get();


    return view('admin.reportList', compact('reportlist'));
}

    public function reportListEdit($id)
    {

        $item = lostitems::find($id);
        $image = itemimage::where('item_id', $id)->get();


        return view('admin.editItemList', compact('item', 'image'));
    }


    public function reportListUpdate(Request $request)
    {


        $attraction = array(
            'user_id' => $request->user_id,
            'category' => $request->category,
            'color' => $request->color,
            'date' => $request->date,
            'place' => $request->place,
            'description' => $request->description,

        );
        $data = lostitems::find($request->id)->update($attraction);

        if ($request->hasFile('file_name')) {

            $file = $request->file('file_name');


            $files = $file->getClientOriginalExtension();

            $name = rand(123, 9999) . '.' . $files;
            $file->move('img/items/', $name);

            $image = itemimage::where('item_id', $request->id)->first();

            $image->file_name = $name;

            $image->update();


        } else {

            $name = '';
        }
        return redirect('dashboard/items-list');

    }


    public function approve()
    {

        return view('admin.send_email');
    }

    public function store(Request $request)
    {
        //upload image
        if ($request->hasFile('image')) {
            if ($file = $request->file('image')) {
                if ($file->isValid()) {

                    $files = $file->getClientOriginalExtension();
                    $name = rand(123, 9999) . '.' . $files;
                    $file->move('img/items/', $name);
                }
            }
        }


        $lostitems = new lostitems();
        $lostitems->category = request('category');
        $lostitems->user_id = request('user_id');
        $lostitems->color = request('color');
        $lostitems->date = request('date');
        $lostitems->place = request('place');
        $lostitems->description = request('description');
        $lostitems->image = $name;
        $lostitems->save();
        return redirect()->back();

    }

    public function PendingreportList()
    {

        $pendingItems = Report::with('lostitem')->where('status', 0)->get();

        return view('admin.pendingListItems', compact('pendingItems'));
    }

    public function pendingItemApprove($id)
    {

        Report::with('user','lostitem')->where('item_id',$id)->where('status', 1)->update(['status' => 0]);
        lostitems::with('user','report')->where('id',$id)->where('status', 1)->update(['status' => 0]);
//
//            $item = lostitems::with(['user', 'report'])->where('status', 1)->update(['status' => 0]);
//             Report::with(['user', 'lostitem'])->where('status', 1)->update(['status' => 0]);


        return redirect('dashboard/items-Pendinglist');
    }

    public function pendingItemDisApprove($id)
    {

        $item = lostitems::where('id', $id)->where('status', 1)->update(['status' => 0]);

        return redirect('dashboard/items-list');
    }

    public function itemApprove($id)
    {

        $pendingItems = lostitems::where('id', $id)->where('status', 1)->update(['status' => 0]);
        return view('admin.pendingListItems', compact('pendingItems'));
    }

    public function rejectItem($id){
        Report::with('user','lostitem')->where('item_id',$id)->where(['status'=> 1,'reject'=>1])->update(['reject' => 0]);

        return redirect('dashboard/report-list');
    }


}

