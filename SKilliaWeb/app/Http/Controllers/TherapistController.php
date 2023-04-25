<?php

namespace App\Http\Controllers;
use App\Models\TherapistModel;

use Illuminate\Http\Request;

class TherapistController extends Controller
{
    public function index()
    {
        $items = TherapistModel::all();
        return view('your_view_name', compact('items'));
    }
    
    public function create()
    {
        return view('profile');
    }
    
    public function store(Request $request)
    {
        TherapistModel::create($request->all());
        // print_r(request()->all());
        // return redirect()->route('/view');
        return view('profile');

    }
    
    // public function edit($id)
    // {
    //     $item = TherapistModel::findOrFail($id);
    //     return view('your_edit_view_name', compact('item'));
    // }
    
    // public function update(Request $request, $id)
    // {
    //     $item = TherapistModel::findOrFail($id);
    //     $item->update($request->all());
    //     return redirect()->route('your_route_name.index');
    // }
    
    public function destroy($id)
    {
        $item = TherapistModel::findOrFail($id);
        $item->delete();
        return redirect()->route('view');
    }
}
