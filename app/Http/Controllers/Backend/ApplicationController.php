<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('backend.applications.index');
    }

    public function data()
    {
        $query = Application::query();
        return datatables()->of($query)->toJson();
    }
    
    public function read(Request $request)
    {
        $application = Application::findOrFail(request()->id);
        if($application->seen == 0)
        {
            $application->seen = 1;
        }else {
            $application->seen = 0;
        }
        
        return response()->json([
            'data' => [
              'success' => $application->save(),
              'app' => $application
            ]
        ]);
    }

    public function delete()
    {
        if (request()->has('id')) {
            $item = Application::find(request()->input('id'));
            $item->delete();            
            $response = [
                'status' => 'success',
                'message' => trans('application sucessfully removed!')
            ];                                   
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Пожалуйста попробуйте снова'
            ];
        }
      
      return response()->json($response);
    }
}
