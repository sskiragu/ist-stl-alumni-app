<x-app-layout> 


<div class="container">
    <h1>Create Job</h1>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="required_skills">Required Skills</label>
            <input type="text" name="required_skills" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

</x-app-layout>
