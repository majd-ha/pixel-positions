<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite("resources/js/app.js")
    <title>pixel positions</title>
</head>
<body class="bg-custom text-white">
    <div class="px-10">


<nav class="flex justify-between items-center py-4 border-b border-white/10">
<div >
    <a href="/">
    <img src={{Vite::asset("resources/images/logo.svg")}} alt="">
    </a>
</div>
<div class="space-x-6 font-bold">
    <a href="#">Job</a>
    <a href="#">salarys</a>
    <a href="#">courses</a>
    <a href="#">companies</a>
</div>
@auth
  <div class="flex items-center gap-4">
   <a href="/jobs/create"> create a job</a>
   <form action="/logout" method="POST">
@csrf
@method('DELETE')
<button class="bg-red-500 px-7 py-2 rounded-xl">Logout</button>
</form>


</div>
@endauth
@guest
<div class="space-x-6 font-bold">
    <a href="/register">register</a>
    <a href="/login">login</a>

</div>

@endguest
</nav>
</div>
    <main class="mt-10 max-w-[986px] mx-auto">
        {{$slot}}
    </main>
</body>
</html>
