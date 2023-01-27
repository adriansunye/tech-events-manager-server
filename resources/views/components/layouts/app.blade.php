<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white">
    
    @if(session('status'))
    <div class=" z-50 px-3 py-2 font-bold text-white bg-emerald-500 dark:bg-emerald-700">
        {{ session('status') }}
    </div>    
    @endif
    {{ $slot }}

    <x-layouts.mobile-navigation />

</body>

</html>
