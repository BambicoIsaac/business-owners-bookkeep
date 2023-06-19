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


class SaleController extends Controller
{
    public function viewAll(): View
    {
        if(Auth::check()){
            $sales = Record::select()->where('Category','Sales')->get();            
            $start_date = "";
            $end_date = "";
            return view('sales.index') ->with([
                'sales' => $sales,
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
            $sales = Record::select()->where('Category','Sales')->get();            
            $start_date = "";
            $end_date = "";
            session()->forget('success');
            session()->forget('failure');
            session()->flash('success', 'Successfully removed filter.');
            return view('sales.index') ->with([
                'sales' => $sales,
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
            $salesFiltered = Record::select('id','date','description','amount')
                                ->where('Category','Sales')
                                ->where('date', '>=', $start_date)
                                ->where('date', '<=', $end_date)
                                ->get();
    
            if($request->input('filter'))
            {
                session()->flash('failure', 'Successfully filtered the table.');            
                return view('sales.index') ->with([
                    'sales' => $salesFiltered,
                    'start_date' => $start_date,
                    'end_date' => $end_date
                ]);
            }
            
            $data = [
                'start_date' => Carbon::parse($start_date)->format('F d Y'),
                'end_date' => Carbon::parse($end_date)->format('F d Y'),
                'title' => 'Sales from '.$start_date. ' to '.$end_date,
                'sales' => $salesFiltered
            ]; 
                
            $pdf = PDF::loadView('sales.FilteredPDF', $data);
        
            return $pdf->download('Sales from '.$formatted_start_date.' to '.$formatted_end_date.'.pdf');
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

    public function createForm(): View
    {
        if(Auth::check()){
            return view('sales.create');
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

    public function updateForm($id): View
    {
        if(Auth::check()){
            $sales = Record::find($id);
            return view('sales.update')-> with(['sale' => $sales]);
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

    public function delete($id): RedirectResponse
    {
        if(Auth::check()){
            Record::find($id)->delete();
            $sales = Record::all()->where('Category','Sales');
            $start_date = "";
            $end_date = "";
            return redirect()->route('sales.viewAll')->withSuccess('Sales Record has been successfully deleted!');
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

    public function storeCreate(Request $request): RedirectResponse
    {    
        if(Auth::check())
        {
            $start_date = "";
            $end_date = ""; 
            Record::create([
    
                'category' => "Sales",                
                'description' => 'Sales on '.Carbon::parse($request -> date)->format('F d Y'),
                'date'=> $request -> date,
                'amount' => $request -> amount
            ]);
    
            return redirect()->route('sales.viewAll')->withSuccess('Sales Record successfully added!')->with([
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);
        }
        
        return redirect()->route('authenticate')->withSuccess('You do not have access for this page.');
    }

    public function storeUpdate(Request $request, $id): RedirectResponse
    {
        if(Auth::check())
        {
            $start_date = "";
            $end_date = "";
            Record::find($id)->update([
                'category' => "Sales",                
                'description' => 'Sales on '.Carbon::parse($request -> date)->format('F d Y'),
                'date' => $request -> date,
                'amount' => $request -> amount
            ]);
            return redirect()->route('sales.viewAll')->withSuccess('Sales Record successfully updated!')->with([
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

    public function generatePDF()
    {
        if(Auth::check())
        {
            $sales = Record::select()->where('Category','Sales')->get();
    
            $data = [
                'title' => 'Sales',
                'sales' => $sales
            ]; 
                
            $pdf = PDF::loadView('sales.PDF', $data);
        
            return $pdf->download('Sales.pdf');
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
