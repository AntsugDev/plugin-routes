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
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold">
                    <th class="p-4">Metodo</th>
                    <th class="p-4">URI</th>
                    <th class="p-4">Controller</th>
                    <th class="p-4">Funzione</th>
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