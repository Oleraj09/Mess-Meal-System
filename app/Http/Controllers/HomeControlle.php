<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Balance;
use App\Models\BazarList;
use App\Models\MealList;
use App\Models\NoticeBoard;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeControlle extends Controller
{
    public function index()
    {
        $users = User::where('status','in')->get();
        $id = Auth::user()->id;
        $month = date('m');
        $year = date('Y');
        $notice = NoticeBoard::Orderby('id','DESC')->first();
        $totalmeal = DB::table('meal_lists')->sum('total');
        $totalbazars = DB::table('bazar_lists')->sum('amount');
        $toalmeal = DB::select('
            select
                SUM(meal_lists.total) as total
            from 
                meal_lists
            inner join 
                users on users.id = meal_lists.userid 
            where 
                (users.id = '.$id.') and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
        ');
        $bal = DB::table('amounts')->where('userid', '=', $id)->sum('amount');
        $expense = DB::select('
            select
                SUM(bazar_lists.amount) as exp
            from 
                bazar_lists
            inner join 
                users on users.id = bazar_lists.userid 
            where 
                (bazar_lists.month = ' . $month . ') and (bazar_lists.year = ' . $year . ')
        ');
        $mealrate = DB::select('
            select
                SUM(meal_lists.total) as meal
            from 
                meal_lists
            inner join 
                users on users.id = meal_lists.userid 
            where 
                (users.status = "in") and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
        ');
        $allmeal = DB::select('
            select
                users.id as id, users.name as name, meal_lists.lunch as lunch, meal_lists.day as day, meal_lists.month as month, meal_lists.year as year, meal_lists.dinner as dinner, meal_lists.created_at as date, ( meal_lists.lunch + meal_lists.dinner) as total
            from 
                meal_lists
            inner join 
                users on users.id = meal_lists.userid 
            where 
                (users.status = "in") and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
            order by
                meal_lists.created_at ASC
        ');
        return view('custom.index', compact('allmeal', 'toalmeal', 'bal','mealrate','expense','totalmeal','totalbazars','notice','users'));
    }
    public function mealupdate($id,Request $request){
        $days = $request->day;
        $l = $request->lunch;
        $d = $request->dinner;
        $dt = $request->day;
        $user = DB::select('
            update 
                meal_lists
            set 
                meal_lists.lunch = '.$l.' , meal_lists.dinner = '.$d.' , meal_lists.total = '.$d.' + '.$l.'
            where
                meal_lists.userid = '.$id.' && meal_lists.day = '.$dt.'
        ');
        return redirect()->back();
    }
}
