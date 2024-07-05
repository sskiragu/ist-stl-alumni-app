<x-app-layout>

<div class="container">
    <h1>Job Notifications</h1>
    <ul>
        @foreach($jobs as $job)
            <li>{{ $job->title }}</li>
        @endforeach
    </ul>
</div>

</x-app-layout>
