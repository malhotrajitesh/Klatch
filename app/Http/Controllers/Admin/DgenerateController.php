<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factory;
use App\Applyevent;
use Symfony\Component\HttpFoundation\Response;
use Artisan;

class DgenerateController extends Controller
{

 public function index()
    {
        
        abort_if(Gate::denies('database_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      $datas = Schema::getAllTables();
         $dbname = DB::getDatabaseName();
         
   
      return view('admin.dgenerates.index', compact('datas','dbname'));

    }

public function genfake(Request $request)
    {

     $qty = (int)$request->tqty;

    factory(Applyevent::class, $qty)->create();
  
   
     return  redirect()->route('admin.dgenerates.index')->withSuccess('Event Fake added Successfully ');

    }


public function makemodal(Request $request)
    {

     $coman =  $request->ftype;
       $moname  =  $request->fname;
       Artisan::call($coman,['name' => $moname]);
           $version =  Artisan::output();
  
   
     return  redirect()->route('admin.dgenerates.index')->withSuccess('File Added  ', $version);

    }

    public function maketable(Request $request)
    {
       $name = $request->name;  

        Schema::connection('mysql')->create($name, function($table)
    {
        $table->increments('id');
        $table->timestamps();
        $table->softDeletes();
    });

        return  redirect()->route('admin.dgenerates.index')->withSuccess('Generated New Table ');
    }


     public function makeduptable(Request $request)
    {
       $name = $request->tname;  
       $oname = $request->oname;

    $result =  DB::statement('CREATE TABLE '.$name.' LIKE '.$oname.'');

        return  redirect()->route('admin.dgenerates.index')->withSuccess('Duplicated Table added',$result);
    }

public function gettstructure($taname)
    {
       
  
         $results = DB::select( DB::raw('SHOW COLUMNS FROM '.$taname.''));
 
   // $results = Schema::getColumnListing($taname);
  
        return view('admin.dgenerates.show', compact('results'));
    }

    public function addfield(Request $request)
    {
      $newColumnType = $request->type;
$newColumnName = $request->colname;
$tname = $request->name;
$size = $request->size;

Schema::table($tname, function (Blueprint $table) use ($newColumnType, $newColumnName,$size) {

    return  $table->$newColumnType($newColumnName,$size)->nullable();

});

return  redirect()->route('admin.dgenerates.index')->withSuccess('Success','Column Created Successfully');
    }

   

}
