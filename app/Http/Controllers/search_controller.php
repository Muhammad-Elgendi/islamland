<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\log as log;

use Illuminate\Support\Facades\Schema;

use App\link as link;

use App\item as item;

use App\visitor as visitor;

class search_controller extends Controller
{
    //
    public function Search(Request $request)
    {
        //get typed ward from request
        $search =$request->input('search');

        //log desired wards into logs table
        $insert = new log;
        $insert->search =$search;
        $insert->save();

        //domain(column) for search
        $columns = ['link','link_title','title','content','content1',
            'content2','content3','content4','content5','content6',
            'description','keywords','author'];

        //selecting desired table
        $query = item::query();

        foreach($columns as $column){
            $query->where('working',1)->where('id','>',7)->Where($column, 'like', '%'.$search.'%');
        }
        $items = $query->paginate(8);

        //get the lastest item visited
        $viewnow = item::where([
            ['visits', '>', 0],
            ['id', '>', 7],
            ['working','=',1]
        ])->orderBy('updated_at', 'desc')->take(4)->get();

        //get the visitor counter
        $sitecounter=visitor::find(1);
        return view('search')
            ->with('items',$items)
            ->with('viewnow',$viewnow)
            ->with('sitecounter',$sitecounter)
            ->with('section_ar','البحث')
            ;
    }
}
