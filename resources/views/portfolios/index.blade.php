<x-app-layout> 


<div class="container">
    <h1>Your Portfolios</h1>
    <a href="{{ route('portfolios.create') }}" class="btn btn-primary">Create Portfolio</a>
    <ul>
        @foreach($portfolios as $portfolio)
            <li>{{ $portfolio->title }}</li>
            <li>{{ $portfolio->description }}</li>
            <li>{{ $portfolio->skills }}</li>
        @endforeach
    </ul>
</div>

</x-app-layout>
