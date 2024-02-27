<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>{{ $title ?? 'Welcome' }}</title>
    @livewireStyles
</head>

<body>
    <div class="flex min-h-full container max-w-3xl justify-center py-12 mx-auto">
        {{ $slot }}
    </div>
    @livewireScripts
</body>

</html>
