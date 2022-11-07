<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Follow;
use App\Job;
use App\Ivent;
use App\Ad;
use App\Company;
use App\Report;
use App\Profile;
use App\Charts\UserChart;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
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

     $data['cp_today']  = Report::where('created_at', '>=', $todayDate)->count();
      $data['cp_week']  = Report::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->count();
       $data['cp_month']  =  Report::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->count();   
    $data['cp_total']   =Report::count(); 

     $data['pro_today']  = Profile::where('created_at', '>=', $todayDate)->where('prog', '=', 100)->count();
    $data['pro_week']  = Profile::where('created_at', '>=', $weekStartDate)->where('created_at', '<=', $weekEndDate)->where('prog', '=', 100)->count();
       $data['pro_month']  =  Profile::where('created_at', '>=', $monthStart)->where('created_at', '<=', $monthEnd)->where('prog', '=', 100)->count();   
    $data['pro_total']   =Profile::count();
    
 

         $api = url('/admin/dashboards/cbyajax/');

        $chartx = new UserChart;
        $chartx->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])->load($api);


    //  $cpu = shell_exec("grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage}'");
    

     $exec_loads = sys_getloadavg();
$exec_cores = trim(shell_exec("grep -P '^processor' /proc/cpuinfo|wc -l"));
 $data['cpu'] = round($exec_loads[1]/($exec_cores + 1)*100, 0) . '%';


  $exec_free = explode("\n", trim(shell_exec('free')));
$get_mem = preg_split("/[\s]+/", $exec_free[1]);
$data['meminp'] = round($get_mem[2]/$get_mem[1]*100, 0) . '%';


$exec_free = explode("\n", trim(shell_exec('free')));
$get_mem = preg_split("/[\s]+/", $exec_free[1]);
$data['memingb'] = number_format(round($get_mem[2]/1024/1024, 2), 2) . '/' . number_format(round($get_mem[1]/1024/1024, 2), 2);

$exec_uptime = preg_split("/[\s]+/", trim(shell_exec('uptime')));
$data['seruptime'] = $exec_uptime[2] . ' Days';


        return view('admin.dashboards.index',compact('chart','chart1','chartx'))->with('data',$data);
    }


  public function cbyajax(Request $request)
    {



        $year = $request->has('year') ? $request->year : date('Y');
        $macd = $request->has('utrk') ? $request->utrk : '\User';
        $uct = $request->has('uch') ? $request->uch : 'bar';
           
        $moscd="App".$macd;
        $rdxs = $moscd::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');


for ($i=0; $i<=count($rdxs); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
  
        $chartx = new UserChart;
  
        $chartx->dataset('New '.substr($macd, 1).' Chart', $uct, $rdxs)->dashed([5])->color($colours)->backgroundcolor($colours);
  
        return $chartx->api();
    }



}
