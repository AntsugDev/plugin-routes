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
        td{
            white-space: nowrap;
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
            <table class="table table-hover table-striped table-responsive-md table-secondary">
                <thead>
                <tr>
                    <th colspan="4" style="text-align: right">
                        <span class="badge bg-info">
                              Totale: {{ count($routes) }}
                        </span>
                    </th>
                </tr>
                <tr>
                    <th scope="col" style="max-width: 150px">Method</th>
                    <th scope="col" style="max-width: 150px">Uri</th>
                    <th scope="col" style="max-width: 150px">Controller</th>
                    <th scope="col" style="max-width: 150px">Function</th>
                </tr>
                </thead>
                <tbody>
                @foreach($routes as $route):
                <tr>
                    <td>
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
                    </td>
                    <td>/{{ ltrim($route['uri'], '/') }}</td>
                    <td>{{ $route['controller'] }}</td>
                    <td>{{ $route['function'] }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>