<?php

namespace App\Http\Controllers;

use App\Models\BazarList;
use App\Models\Complain;
use App\Models\MealList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function index()
    {
        // $member = User::where('status','in')->get();
        $users = User::where('status', 'in')->get();
        $members = User::where('status', 'out')->get();
        return view('custom.pages.member', compact('users', 'members'));
    }
    public function profile()
    {
        $users = User::where('status', 'in')->get();
        $ids = Auth::user()->id;
        $data = User::find($ids);
        return view('custom.pages.profile', compact('data', 'users'));
    }
    public function profileconf(Request $request)
    {
        $ids = Auth::user()->id;
        $data = User::find($ids);
        $data->name = "$request->name";
        $data->phone = "$request->phone";
        $data->adress = "$request->adress";
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user'), $filename);
            $data->photo = $filename;
        }
        $data->save();
        Alert::success('Infromation', 'Your profile update successfully done!!');
        return redirect()->back();
    }
    public function meal()
    {
        $users = User::where('status', 'in')->get();
        $id = Auth::user()->id;
        $month = date('m');
        $year = date('Y');
        $totalz = DB::select('
            select 
                SUM(meal_lists.total) as total
            from 
                meal_lists
            inner join 
                users on users.id = meal_lists.userid
            where
                (users.id = ' . $id . ') and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
        ');
        $meal = DB::select('
            select 
                users.name as name, meal_lists.month as month, meal_lists.year as year, meal_lists.day as day, meal_lists.lunch as lunch, meal_lists.dinner as dinner, (meal_lists.lunch + meal_lists.dinner) as total
            from 
                meal_lists
            inner join users on users.id = meal_lists.userid 
            where (meal_lists.userid = ' . $id . ') and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
        ');
        return view('custom.pages.mymeal', compact('meal', 'totalz', 'users'));
    }
    public function bazar()
    {
        $users = User::where('status', 'in')->get();
        $month = date('m');
        $year = date('Y');
        $bazar = DB::select('
            select 
                users.name as name, bazar_lists.amount as amount, bazar_lists.list as list, bazar_lists.day,bazar_lists.month,bazar_lists.year
            from 
                bazar_lists 
            inner join users on users.id = bazar_lists.userid
            where (bazar_lists.month = ' . $month . ') and (bazar_lists.year = ' . $year . ')
        ');
        $id = Auth::user()->id;
        $totalz = DB::select('
            select 
                SUM(bazar_lists.amount) as total
            from 
                bazar_lists
            inner join 
                users on users.id = bazar_lists.userid
            where
                (bazar_lists.month = ' . $month . ') and (bazar_lists.year = ' . $year . ')
        ');
        return view('custom.pages.bazarlist', compact('users', 'bazar', 'totalz'));
    }
    public function listsubmit()
    {
        $users = User::where('status', 'in')->get();
        return view('custom.pages.submitbazar', compact('users'));
    }
    public function listsubmitconf(Request $request)
    {
        $bazarlist = new BazarList();
        $bazarlist->userid = Auth::user()->id;
        $bazarlist->day = date('d');
        $bazarlist->month = date('m');
        $bazarlist->year = date('Y');
        $bazarlist->amount = "$request->amount";
        $bazarlist->list = "$request->items";
        $bazarlist->save();
        Alert::success('Market List', 'Bazar List Submitted Succesfully!!');
        return redirect()->route('bazar');
    }
    public function complain()
    {
        $user = User::where('status', 'in')->get();
        $users = User::where('status', 'in')->get();
        return view('custom.pages.complain', compact('user', 'users'));
    }
    public function complainconf(Request $request)
    {
        $cp = new Complain();
        $cp->victim = Auth::user()->id;
        $cp->guilty = "$request->guilty";
        $cp->reason = "$request->reason";
        $cp->save();
        Alert::success('Complain', 'New Complain Added!!');
        return redirect()->route('dashboard');
    }
    public function mealconf(Request $r)
    {
        $d = date('d');
        $id = Auth::user()->id;
        if (MealList::where('userid', '=', $id)->exists() && MealList::where('day', '=', $d)->exists()) {
            Alert::error('Meal Added Fail', 'Already added meal for today!!');
            return redirect()->back();
         }else{
            $meal = new MealList();
            $meal->userid = Auth::user()->id;
            $meal->day = date('d');
            $meal->month = date('m');
            $meal->year = date('Y');
            $meal->lunch = "$r->lunch";
            $meal->dinner = "$r->dinner";
            $total = ($r->dinner + $r->lunch);
            $meal->total = "$total";
            $meal->save();
            Alert::success('Meal Added', 'Your Meal added for today!!');
            return redirect()->back();
         }
    }
}
