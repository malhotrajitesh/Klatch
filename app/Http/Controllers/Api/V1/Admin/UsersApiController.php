<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\User;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles'])->get());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

 public function alluserdata(Request $request)
    {

     
 $user = User::withCount(['followings', 'followables','ads','jobs','events','socials'])->find($request['cid']);
 $userx = auth()->user();
 $user = $userx->attachFollowStatus($user);


    $ads = $user->ads()->where('ad_status', '=', 'Approve')->orWhere('ad_status', '=', 'Sold')->latest()->limit(100)->get();
   // $ac=$ads->count();
    $jobs = $user->jobs()->where('jstatus', '=', 'Approve')->latest()->with('jprofiles','cbranchs:id,name','skills:id,name','degrees:id,name')->limit(100)->get();
    //$jc=$jobs->count();
    $events = $user->events()->where('ev_status', '=', 'Approve')->latest()->limit(100)->get();
    $socials = $user->socials()->where('so_status', '=', 'Approve')->latest()->with(['user_by','allcomments'])->withCount(['aplike','solike','commli'])->limit(100)->get();
    $profile = $user->profiles()->get();
   // $ec=$events->count();
   // $tc = $ac+$jc+$ec;
    return response(['user'=>$user, 'profile'=>$profile,  'ad'=>$ads, 'job'=>$jobs, 'events'=>$events, 'socials'=>$socials]);

   // return response(['user'=>$user, 'profile'=>$profile, 'tc'=>$tc, 'ac'=>$ac, 'ad'=>$ads, 'jc'=>$jc, 'job'=>$jobs, 'ec'=>$ec, 'events'=>$events]);


    }

 public function followx(Request $request)
    {
      $uid=$request->uid;
 
        $user =User::find($uid);
        auth()->user()->toggleFollow($user);
 
    return response(['msg'=>'success']);
}




}
