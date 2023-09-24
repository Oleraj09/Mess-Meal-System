<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\NoticeBoard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMessage;

class AdminController extends Controller
{
    public function logins(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Alert::success('Login Success', 'Provided Credentials are Valid. Redirecting to Dashboard!!');
            return redirect()->intended('dashboard');
        }
        return back();
        Alert::error('Error! Try Again', 'Provided Credentials are Incorect. Try Valid Email and Passeord!!');
    }
    public function noticeconf(Request $request)
    {
        $notice = new NoticeBoard();
        $notice->notice = "$request->notice";
        $notice->save();
        Alert::success('Notice', 'New Notice Added Successfully!!');
        return redirect()->back();
    }
    public function balanceconf(Request $r)
    {
        $bal = new Amount();
        $bal->userid = "$r->id";
        $bal->amount = "$r->amount";
        $bal->day = date('d');
        $bal->month = date('m');
        $bal->year = date('Y');
        $bal->save();
        Alert::success('Balance', 'User Balance Added Successfully!!');
        return redirect()->route('dashboard');
    }
    public function addconf(Request $request)
    {
        $add = new User();
        $add->name = "$request->name";
        $add->username = str_replace(' ', '.', $request->name) . rand();
        $add->email = "$request->email";
        $add->phone = "$request->phone";
        $add->password = Hash::make($request->password);
        $add->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $del = User::find($id);
        if ($del->status == 'in') {
            $del->status = 'out';
            $del->save();
            Alert::error('Deactive', 'User Deactivation Successfully!!');
        } else {
            $del->status = 'in';
            $del->save();
            Alert::success('Activate', 'User Re-activation Successfully!!');
        }

        return redirect()->back();
    }
    public function summary(Request $request)
    {
        $month = date('m');
        $year = date('Y');
        $users = User::where('status', 'in')->get();
        $id = $request->id;
        // $toalmeal = DB::select('
        //     select
        //         SUM(meal_lists.total) as total
        //     from 
        //         meal_lists
        //     inner join 
        //         users on users.id = meal_lists.userid 
        //     where 
        //         (users.id = '.$id.') and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
        // ');

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
        $total = DB::select('
            select 
                bazar_lists.amount as amount, users.name as name, users.id as id
            from 
                bazar_lists
            inner join 
                users on users.id = bazar_lists.userid
            where
                (bazar_lists.month = ' . $month . ') and (bazar_lists.year = ' . $year . ')
        ');
        $amounts = DB::select('
            select 
                amounts.amount as amount, users.name as name, users.id as id 
            from 
                amounts
            inner join 
                users on users.id = amounts.userid
            where
                (amounts.month = ' . $month . ') and (amounts.year = ' . $year . ')
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
        return view('custom.pages.viewsummary', compact('users', 'totalz', 'total', 'mealrate', 'expense', 'amounts'));
    }
    public function showsummary($id)
    {
        $month = date('m');
        $year = date('Y');
        $users = User::find($id);
        $bal = DB::table('amounts')->where('userid', '=', $id)->sum('amount');
        $toalmeal = DB::select('
        select
            SUM(meal_lists.total) as total
        from 
            meal_lists
        inner join 
            users on users.id = meal_lists.userid 
        where 
            (users.id = ' . $id . ') and (meal_lists.month = ' . $month . ') and (meal_lists.year = ' . $year . ')
        ');
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
        return response()->json([$toalmeal, $users, $bal, $expense, $mealrate]);
    }
    public function makemanager($id)
    {
        $cid = Auth::user()->id;
        $users = User::find($id);
        $musers = User::find($cid);
        if ($users->role == 'member') {
            $users->role = 'manager';
            $musers->role = 'member';
        }
        $users->save();
        $musers->save();
        Alert::success('Permission', 'New Manager Added Successfully!!');
        return redirect()->back();
    }
    public function sendmail()
    {
        $users = User::where('status', 'in')->get();
        return view('custom.pages.sendmail', compact('users'));
    }
    public function sendemailconf(Request $request)
    {
        $recipient = $request->input('recipient');
        $subject = $request->input('subject');
        $messages = $request->input('message');
        Mail::to($recipient)->send(new SendMessage($subject, $recipient, $messages));
        Alert::success('Mail', 'Sending Mail Successful!!');
        return redirect()->back()->with('success', 'Email sent successfully.');
    }
}
