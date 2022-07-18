<?php

namespace App\Http\Controllers;

use App\event;
use App\Models\Section;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=event::all();
        return view('events',compact('event'));
    }


    public function destroy(Request $request)
    {
        event::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('events.index');
    }
}
