<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Exports\UsersExport;
use App\Http\Rquest;
use Excel;
use App\User;
use DB;

class ExportExcelController extends Controller
{
    function index()
    {
        $this->authorize('exportExcel',User::class);
        $customer_data = DB::table('users')->get();

        return view('pages.export_excel')->with('customer_data', $customer_data);

    }

    function excel()
    {

        $this->authorize('exportExcel',User::class);
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
