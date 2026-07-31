<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugin Routes - Dashboard Rotte</title>
    <link rel="stylesheet" href="{{ asset('vendor/plugin-routes/css/bootstrap.min.css') }}">
    <style>
        .main {
            display: flex;
            flex-direction: column;
            padding: 15px;
            gap: 3px;
            justify-content: center;
            align-content: center;
        }

        form {
            padding: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        td {
            white-space: nowrap;
        }
        .group{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-content: flex-start;
            max-width: 98% !important;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 10px;
        }
        .container{
            max-height: 300px;
            padding: 5px;
        }
        .container> div{
            font-size: 12px!important;
        }
    </style>
<body>
<div class="main">
    <div class="card text-white bg-secondary mb-3" style="max-width: 70rem;">
        <div class="card-header">
            <h3 class="card-title">Plugin Routes - Dashboard</h3>
        </div>
        <div class="card-body">
            <h4 class="card-title">List Routes</h4>
            <form method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cerca uri" aria-label="Cerca Uri"
                           aria-describedby="button-addon2">
                    <button class="btn btn-info" type="submit" id="button-addon2">Search Uri</button>
                </div>
            </form>
            <div class="group">
            @foreach($routes as $k =>  $route)
                @php
                $backgroundColor = $k%2 === 0 ? 'bg-secondary' : 'bg-light'
                @endphp
            <div class="list-group list-group-flush {{$backgroundColor}} container" style="width: 90%!important;margin-bottom: 10px">
                <div class="list-group-item list-group-item-action">
                    @php
                    $methodClass = match($route['method']) {
                    'GET' => 'bg-success',
                    'POST' => 'bg-warning',
                    'PUT', 'PATCH' => 'bg-secondary',
                    'DELETE' => 'bg-danger',
                    default => 'bg-dark',
                    };
                    @endphp
                    <span class="badge {{$methodClass}}">{{$route['method']}}</span>
                </div>
                <div class="list-group-item list-group-item-action"><strong>Uri:&nbsp;</strong>/{{ ltrim($route['uri'], '/') }}</div>
                <div class="list-group-item list-group-item-action"><strong>Controller:&nbsp;</strong>{{ $route['controller'] }}</div>
                <div class="list-group-item list-group-item-action"><strong>Function:&nbsp;</strong>{{ $route['function'] }}</div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>