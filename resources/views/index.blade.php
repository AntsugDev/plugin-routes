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

        .group {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-content: flex-start;
            max-width: 98% !important;
            padding: 10px;
            margin-bottom: 10px;
            margin-right: 10px;
        }

        .container {
            max-height: 300px;
            padding: 5px;
        }

        .container > div {
            font-size: 12px !important;
            color: #0b2932;
        }
    </style>
<body>
<div class="main">
    <div class="card text-white bg-secondary mb-3" style="max-width: 70rem;">
        <div class="card-header">
            <h3 class="card-title">Plugin Routes - Dashboard
            &nbsp;
                <span class="badge bg-info}">Totale delle rotte: {{count($routes)}}</span>
            </h3>
        </div>
        <div class="card-body">
            <h4 class="card-title">List Routes</h4>

            <form method="get" id="form-search">
                <input type="hidden" name="search" value="" id="search">
            </form>
            <div class="input-group mb-3">
                <input id="tsearch" type="text" class="form-control" placeholder="Cerca uri" aria-label="Cerca Uri"
                       aria-describedby="button-addon2">
                <button class="btn btn-info" type="button" id="btn_search">Search Uri</button>
                <button class="btn btn-dark" type="button" id="btn_clear">Clear</button>
            </div>
            <div class="progress" id="progress" style="display:none;margin-left: 5px;margin-right: 5px;padding: 5px">
                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                     style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="group">
                @foreach($routes as $k => $route)
                @php
                $backgroundColor = $k%2 === 0 ? 'bg-secondary' : 'bg-light'
                @endphp
                <div class="list-group list-group-flush {{$backgroundColor}} container"
                     style="width: 90%!important;margin-bottom: 10px">
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
                    <div class="list-group-item list-group-item-action"><strong>Uri:&nbsp;</strong>/{{
                        ltrim($route['uri'], '/') }}
                    </div>
                    <div class="list-group-item list-group-item-action"><strong>Controller:&nbsp;</strong>{{
                        $route['controller'] }}
                    </div>
                    <div class="list-group-item list-group-item-action"><strong>Function:&nbsp;</strong>{{
                        $route['function'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    const btnSearch = document.getElementById('btn_search')
    const btnClear = document.getElementById('btn_clear')
    const inputS = document.getElementById('tsearch')
    const search = document.getElementById('search')
    const form = document.getElementById('form-search')
    const bar = document.getElementById('progress')

    const activeBar = (status) => {
        bar.style.display = status ? "" : "none"
    }

    const clickEvent = (data) => {
        activeBar(true)
        if (data) {
            search.value = data
        } else {
            search.value = ""
        }
        form.submit()
        setTimeout( () => activeBar(false), 10000)
    }
    btnClear.addEventListener('click', () => {

        clickEvent(null)
    })
    btnSearch.addEventListener('click', () => {
        let data = inputS.value
        clickEvent(data)
    })
</script>
</body>
</html>