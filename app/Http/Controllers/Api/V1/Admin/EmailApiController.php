<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Use Validator Class
use Validator;
//Use Mail Class
use Illuminate\Support\Facades\Mail;
//Use Model SendMail
use App\Mail\Myuvamail;
use App\Page;
use App\City;
use App\Rsq;
use Symfony\Component\HttpFoundation\Response;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;
//Use Exception Class
use Exception;

class EmailApiController extends Controller
{
    //Create send_feedback function
    public function uvamail(Request $request) {

  

      //Check validate request
    $datas = $request->validate([
          'uid'    => 'required', 
          'email'   => 'required|email', 
          'msg' => 'required',
          'from' => 'required',
          'subject' => 'required'
        ]);

      

      //if the number of errors is more than zero
      if ($request->uid == 5) {


//return "thank";
        //Try to send Email
        try {
          //Send Email with model of email SendEmail and with variable data
          Mail::to($request->email)->send(new Myuvamail($datas));

          //Check if sending email failure
          if (!Mail::failures()) {
            //Give response message success if success to send email
          
            return response(['message'=> "success"]);
          } else {
            //Give response message failed if failed to send email
            return response(['message'=> "failed"]);
          }

        } catch (Exception $e) {
          //Give response message error if failed to send email
          return response(['message'=> $e->getMessage()]);
         
        }

      } else {

       return response(['message'=> "Enter correct Uid"]);
      }



    }

     public function pages(request $request)
    {
       
       $page = Page::filter($request->except(['_token']))->get();
       return response(['pagedata'=> $page]);
    }

  public function cityx(request $request)
    {
       
       $city = City::select('id','city_name')->orderBy('city_name', 'ASC')->get();
       return response(['city'=> $city]);
    }

     public function rqsx(request $request)
    {
       
       $rqx = Rsq::select('id','rsq_name')->where('rsq_type', '=', 'social')->orderBy('rsq_name', 'ASC')->get();
       return response(['rqdata'=> $rqx]);
    }



}



