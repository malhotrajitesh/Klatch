<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Follow;
use App\Job;
use App\Ivent;
use App\Ad;
use App\Company;
use App\Profile;
use App\Charts\UserChart;
use Carbon\Carbon;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{

    public function index()
    {
      abort_if(Gate::denies('dash_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

$todayDate = Carbon::now()->format('Y-m-d 00:00:00');





$weekn = Carbon::now();
$weekStartDate = $weekn->startOfWeek()->format('Y-m-d H:i:s');
$weekEndDate = $weekn->endOfWeek()->format('Y-m-d H:i:s');




$nown = Carbon::now();

$monthStart = $nown->startOfMonth()->format('Y-m-d H:i:s');

$monthEnd = $nown->endOfMonth()->format('Y-m-d H:i:s');

  $data['u_today']  = User::where('created_at', '>=', $todayDate)->count();
  $data['u_week']  = User::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->count();
          
    
       $data['u_month']  =  User::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->count();   
    $data['u_total'] =  User::count();   
      $data['ad_today']  = Ad::where('created_at', '>=', $todayDate)->where('step', '=', 5)->count();
  $data['ad_week']  = Ad::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->where('step', '=', 5)->count();
    
       $data['ad_month']  =  Ad::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->where('step', '=', 5)->count();   
    $data['Ad_total'] =  Ad::count();  
       $data['jb_today']  = Job::where('created_at', '>=', $todayDate)->where('jstep', '=', 3)->count();
 $data['jb_week']  = Job::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->where('jstep', '=', 3)->count();
    
       $data['jb_month']  =  Job::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->where('jstep', '=', 3)->count();   
    $data['jb_total'] =  Job::count(); 

      $data['et_today']  = Ivent::where('created_at', '>=', $todayDate)->where('ev_step', '=', 3)->count();
 $data['et_week']  = Ivent::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->where('ev_step', '=', 3)->count();
    
       $data['et_month']  =  Ivent::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->where('ev_step', '=', 3)->count();   
    $data['et_total'] =  Ivent::count(); 

     $data['fol_today']  = Follow::where('created_at', '>=', $todayDate)->count();
      $data['fol_week']  = Follow::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->count();
       $data['fol_month']  =  Follow::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->count();   
    $data['fol_total']   =Follow::count(); 

     $data['cp_today']  = Company::where('created_at', '>=', $todayDate)->count();
      $data['cp_week']  = Company::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->count();
       $data['cp_month']  =  Company::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->count();   
    $data['cp_total']   =Company::count(); 

     $data['pro_today']  = Profile::where('created_at', '>=', $todayDate)->where('prog', '=', 100)->count();
    $data['pro_week']  = Profile::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->where('prog', '=', 100)->count();
       $data['pro_month']  =  Profile::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->where('prog', '=', 100)->count();   
    $data['pro_total']   =Profile::count();
    
 $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

            $users = Ad::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $chart = new UserChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('In Ad Chart', 'doughnut', $users)->color($borderColors)->backgroundcolor($fillColors);

          $chart1 = new UserChart;
        $chart1->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart1->dataset('In Ad Chart', 'line', $users)->dashed([5])->color("rgb(255, 99, 132)")->backgroundcolor("rgb(254, 172, 227)");


        return view('admin.dashboards.index',compact('chart','chart1'))->with('data',$data);
    }
}
