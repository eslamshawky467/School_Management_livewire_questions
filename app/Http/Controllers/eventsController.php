<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\event;
use Asdfx\LaravelFullcalendar\Facades\Calendar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class eventsController extends Controller
{
    public function index()
    {
        $events = [];
        $data = event::all();
        if($data->count())
        {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.'+1 day'),
                    null,
                    // Add color
                    [
                        'color'=> $value->color,
                        'textColor' => $value->textColor,
                    ]
                );
            }
        }
        $calendar =\Calendar::addEvents($events);
        return view('eventpage',compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function display()
    {
        return view("addevent");
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'color'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $events=new event;
        $events->title=$request->input('title');
        $events->color=$request->input('color');
        $events->start_date=$request->input('start_date');
        $events->end_date=$request->input('end_date');
        $events->save();
        return redirect('eventpage')->with('success','Event Added');
    }


    public function show()
    {

        $events = event::all();
        return view('display')->with('events',$events);
    }


    public function edit($id)
    {

        $events = event::find($id);
        return view('editform',compact('events','id'));
    }

    public function update(Request $request, $id)
    {

        $events = event::where('id', '=', $id)->first();

        $events->update($request->all());

        return redirect('eventpage')->with('success','Event Updates Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $events = event::find($id);
        $events->delete();
        return redirect('/editeventurl');
    }
}
