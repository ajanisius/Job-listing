<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..500;1,100..500&display=swap"
        rel="stylesheet">
    <title>Rec-Positions</title>
    @Vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-black text-white font-hanken pb-10">
    <div class="px-20">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/">
                    <img class="w-10" src="{{ Vite::asset('resources/images/job-logo.png') }}"
                        alt="">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="/">Home</a>
                <a href="/jobs/all">Jobs</a>
            </div>

            @auth
                <div class="space-x-6 font-bold flex align-center">
                    <a href="/jobs/create">Post a job</a>
                    <form method='POST' action='/logout'>
                        @csrf
                        <button>Log Out</button>
                    </form>
                </div>
            @endauth
            @guest
                <div class="space-x-6 font-bold">
                    <a href="/login">Log In</a>
                    <a href="/register">Sign Up</a>
                </div>
            @endguest

        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
