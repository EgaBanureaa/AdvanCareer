<!DOCTYPE html>
 <html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS Landing Page</title>
    <meta name="description" content="Get started with a free landing page built with Tailwind CSS and the Flowbite Blocks system.">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @yield('custom_style')

</head>
<body>
    @include('header')
    
    @yield('content')
    
    @include('footer')

    @yield('custom_script')
</body>
</html>