<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V04</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    #customers td, #customers th {
        border: 2px solid blue;
        padding: 8px;
    }
    #customers tr:nth-child(even){background-color: #f2f2f2;}
    #customers tr:hover {background-color: #ddd;}
    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
<body>
{{session('msg')}}
<div style="text-align:center">
    <a href="eventpage"> Back To Add New Records </a>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
</div>
<div class="container-table100">
    <table id="customers">
        <thead>
        <tr class="row100 head">
            <th class="cell100 column1" style="color:Maroon">Id</th>
            <th class="cell100 column1" style="color:Maroon">Title</th>
            <th class="cell100 column2" style="color:Maroon">Color</th>
            <th class="cell100 column3"style="color:Maroon"> Start Date</th>
            <th class="cell100 column4" style="color:Maroon">End Date</th>
            <th class="cell100 column5" style="color:Maroon">Action</th>
        </tr>
        </thead>
        @foreach($events as $event )
            <tr class="row100 head">
                <th>{{$event->id}}</th>
                <th>{{$event->title}}</th>
                <th>{{$event->color}}</th>
                <th>{{$event->start_date}}</th>
                <th>{{$event->end_date}}</th>
                <th><a href="{{action('EventController@edit',$event->id)}}" onclick="return confirm('Are you sure?')"  style="color:Purple">Edit </a>&nbsp;
                    <a href="{{action('EventController@destroy',$event->id)}}" onclick="return confirm('Are you sure?')" style="color:Purple">Delete </a>&nbsp;
                </th>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
