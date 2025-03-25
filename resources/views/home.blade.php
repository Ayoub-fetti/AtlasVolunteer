<x-app>
    <h1>hello this is home page</h1>
    <a href="{{ auth()->user()->role === 'volunteer' ? route('profile.index') : route('organization.index') }}"> 
        Go to profile
    </a>
</x-app>