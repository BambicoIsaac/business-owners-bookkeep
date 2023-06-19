<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Record;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use PDF;


class ReportController extends Controller
{
    public function viewAll(): View
    {
        if(Auth::check()){
            $reports = Record::select()->get();            
            $start_date = "";
            $end_date = "";
            return view('reports.index') ->with([
                'reports' => $reports,
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);
        }  

        $user = User::first();
        if(is_null($user)) {
            session()->flash('failure', 'First time use detected. Please initialize your account first by pressing start.');
            return view('welcome');
        }else {            
            session()->flash('success', 'You do not have access for this page.');
            return view('auth.login');
        }
    }

    public function clearFilter(): View
    {
        if(Auth::check()){
            $reports = Record::select()->get();            
            $start_date = "";
            $end_date = "";
            session()->forget('success');
            session()->forget('failure');
            session()->flash('success', 'Successfully removed filter.');
            return view('reports.index') ->with([
                'reports' => $reports,
                'start_date' => $start_date,
                'end_date' => $end_date
            ])->withSuccess('Successfully removed filter.');
        }  

        $user = User::first();
        if(is_null($user)) {
            session()->flash('failure', 'First time use detected. Please initialize your account first by pressing start.');
            return view('welcome');
        }else {            
            session()->flash('success', 'You do not have access for this page.');
            return view('auth.login');
        }
    }

    public function filter(Request $request)
    {
        if(Auth::check()){
            session()->forget('success');
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $formatted_start_date = Carbon::parse($request->start_date)->format('F d Y');
            $formatted_end_date = Carbon::parse($request->end_date)->format('F d Y');
            $reportsFiltered = Record::select()
                                ->where('date', '>=', $start_date)
                                ->where('date', '<=', $end_date)
                                ->get();
    
            if($request->input('filter'))
            {
                session()->flash('failure', 'Successfully filtered the table.');            
                return view('reports.index') ->with([
                    'reports' => $reportsFiltered,
                    'start_date' => $start_date,
                    'end_date' => $end_date
                ]);
            }
            
            $data = [
                'start_date' => Carbon::parse($start_date)->format('F d Y'),
                'end_date' => Carbon::parse($end_date)->format('F d Y'),
                'title' => 'Summary Report from '.$start_date. ' to '.$end_date,
                'reports' => $reportsFiltered
            ]; 
                
            $pdf = PDF::loadView('reports.FilteredPDF', $data);
        
            return $pdf->download('Report from '.$formatted_start_date.' to '.$formatted_end_date.'.pdf');
        }

        $user = User::first();
        if(is_null($user)) {
            session()->flash('failure', 'First time use detected. Please initialize your account first by pressing start.');
            return view('welcome');
        }else {            
            session()->flash('success', 'You do not have access for this page.');
            return view('auth.login');
        }
    }

    public function generatePDF()
    {
        if(Auth::check())
        {
            $reports = Record::select()->get();
    
            $data = [
                'title' => 'Summary Report',
                'reports' => $reports
            ]; 
                
            $pdf = PDF::loadView('reports.PDF', $data);
        
            return $pdf->download('ProfitReport.pdf');
        }
        
        $user = User::first();
        if(is_null($user)) {
            session()->flash('failure', 'First time use detected. Please initialize your account first by pressing start.');
            return view('welcome');
        }else {            
            session()->flash('success', 'You do not have access for this page.');
            return view('auth.login');
        }
    }
}
