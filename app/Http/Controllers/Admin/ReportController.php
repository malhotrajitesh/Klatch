<?php
namespace App\Http\Controllers\Admin;

use App\Report;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reports = Report::withTrashed()->get();
      

        return view('admin.reports.index', compact('reports'));
    }



    public function create()
    {
        abort_if(Gate::denies('report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        



               //  Report::create($request->all());

/*
        return redirect()->route('admin.reports.index')->with('success','This Report 
                    '. $request['report_name'].' Added Successfully');   */
    }

    public function edit(Report $report)
    {
        /*
        abort_if(Gate::denies('report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report;

        return view('admin.reports.edit', compact('report'));
        */
    }

    public function update(Request $request, Report $report)
    {
       /*
        $validatedData = $request->validate(['report_name' => 'unique:reports,report_name,'.$report->id,]);

        $report->update($request->all());
*/
        return redirect()->route('admin.reports.index');
    }

    public function show(Report $report)
    {
        /*
        abort_if(Gate::denies('report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report;

        return view('admin.reports.show', compact('report'));
        */
    }



    public function destroy(Report $report)
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    

        $report->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {


       Report::withTrashed()->whereIn('id', request('ids'))->restore();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
