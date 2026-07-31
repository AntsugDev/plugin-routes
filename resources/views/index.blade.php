<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plugin Routes - Dashboard Rotte</title>
    <!-- Tailwind CSS da CDN per una grafica pulita e moderna senza configurazioni -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 antialiased p-6 md:p-10">

<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Rotte Applicazione</h1>
            <p class="text-slate-500 text-sm mt-1">Elenco completo delle rotte registrate nell'applicazione</p>
        </div>
        <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full">
                Totale: {{ count($routes) }}
            </span>
    </div>

    <!-- Tabella -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                <tr>
                    <th colspan="4" style="text-align: left">
                        <form class="max-w-md mx-auto" method="get">
                            <label for="search"
                                   class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search Uri</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                              d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" id="search" name="search"
                                       class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                                       placeholder="Search" required/>
                                <button type="submit"
                                        class="absolute end-1.5 bottom-1.5 text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">
                                    Search
                                </button>
                            </div>
                        </form>
                    </th>
                </tr>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold">
                    <th class="p-4">Metodo</th>
                    <th class="p-4" style="max-width: 200px!important;">URI</th>
                    <th class="p-4" style="max-width: 200px!important;">Controller</th>
                    <th class="p-4" style="max-width: 200px!important;">Funzione</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                @foreach($routes as $route)
                <tr class="hover:bg-slate-50/80 transition-colors">
                    <!-- Metodo con badge colorati -->
                    <td class="p-4 font-mono font-bold">
                        @php
                        $methodClass = match($route['method']) {
                        'GET' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                        'POST' => 'bg-blue-100 text-blue-700 border-blue-200',
                        'PUT', 'PATCH' => 'bg-amber-100 text-amber-700 border-amber-200',
                        'DELETE' => 'bg-rose-100 text-rose-700 border-rose-200',
                        default => 'bg-slate-100 text-slate-700 border-slate-200',
                        };
                        @endphp
                        <span class="inline-block px-2.5 py-1 text-xs rounded border {{ $methodClass }}">
                                        {{ $route['method'] }}
                                    </span>
                    </td>

                    <!-- URI -->
                    <td class="p-4 font-mono text-slate-900 font-medium">
                        /{{ ltrim($route['uri'], '/') }}
                    </td>

                    <!-- Controller -->
                    <td class="p-4 text-slate-600 font-mono text-xs">
                        {{ $route['controller'] }}
                    </td>

                    <!-- Funzione -->
                    <td class="p-4">
                                    <span class="bg-slate-100 text-slate-700 px-2 py-1 rounded text-xs font-mono font-medium border border-slate-200">
                                        {{ $route['function'] }}
                                    </span>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>