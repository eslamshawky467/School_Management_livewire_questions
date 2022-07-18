<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div calss="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div calss="col-md-8 col-md-offset-2">
            <div calss="panel panel-default">
                <div calss="panel-heading" style="background: #2e6da4; color: white">
                    Add Event To Calendar
                </div>
                <div class="panel-body">
                    <h1> Task : Add Data </h1>
                    <form method="POST" action="{{ route('addevent.store') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for=""> Enter Name Of The Event </label>
                        <input class="form-control" type="text" name="title" placeholder="Enter The Name"/><br/><br/>
                        <label for=""> Enter Color </label>
                        <input class="form-control" type="color" name="color" placeholder="Enter The Color"/><br/><br/>

                        <label for=""> Enter Start Date Of Event </label>
                        <input class="form-control" type="date" name="start_date" class="date" placeholder="Enter Start Date"/><br/><br/>
                        <label for=""> Enter End Date Of Event </label>

                        <input class="form-control" type="date" name="end_date"  class="date" placeholder="Enter End Date"/><br/><br/>
                        <a href="eventpage" class="btn btn-primary"> Back </a>
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Event Data"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
