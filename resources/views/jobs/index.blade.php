<x-app-layout> 

<div class="container">
    <h1>Job Listings</h1>
    <a href="{{ route('jobs.create') }}" class="btn btn-primary">Create Job</a>
    <ul>
        @foreach($jobs as $job)
            <li>{{ $job->title }}</li>
            <li>{{ $job->description }}</li>
            <li>{{ $job->required_skills }}</li>
        @endforeach
    </ul>
</div>

</x-app-layout>
