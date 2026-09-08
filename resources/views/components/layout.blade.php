<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'PT Pelindo Multi Terminal' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/favicon.png" type="image/png">
</head>
<body class="antialiased bg-[#EEF5F9] text-slate-800 font-sans md:pr-20 selection:bg-[#0066AE] selection:text-white">

    <x-navbar />

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>
