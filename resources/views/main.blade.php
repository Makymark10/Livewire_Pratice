<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>Liverwire Practice</title>
    <style></style>
</head>
<body class=" from-blue-100 to-purple-200 bg-gradient-to-br">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-6">Livewire Practice</h1>
        {{-- <div class="flex justify-center mb-8">
            <a href="{{ route('post.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded shadow transition duration-200">
                Create a post!!
            </a>
        </div> --}}
        {{-- Livewire Modal --}}
        @livewire('modal-test')

        {{-- Livewire Posts --}}
        <div class="rounded-lg overflow-y p-6">
            @livewire('postslive')
        </div>
    </div>
    @livewireScripts
</body>
</html>