<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                <!-- Display success messages -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Create a new note -->
                <div class="d-flex align-items-center mb-4">
                    <img src="https://w7.pngwing.com/pngs/80/709/png-transparent-android-note-taking-android-blue-text-logo-thumbnail.png" alt="Note Icon" style="width: 40px; height: 40px;" class="mr-2">
                    <h3 class="font-weight-bold">Create a New Note</h3>
                </div>
                <form method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Note Title" required class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <textarea name="body" placeholder="Note Body" required class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Add Note</button>
                    </div>
                </form>

                <!-- Display notes -->
                <h3 class="mt-4 font-weight-bold">Your Notes</h3>
                @if ($notes->count() > 0)
                    @foreach ($notes as $note)
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">{{ $note->title }}</h5>
                                <p class="card-text" style="font-size: 1rem;">{{ $note->body }}</p>
                                <div class="d-flex justify-content-between mt-3">
                                    <!-- Edit note -->
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                                    <!-- Delete note with confirmation -->
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('notes.destroy', $note->id) }}')">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No notes yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this note?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form id="deleteForm" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(url) {
            document.getElementById('deleteForm').action = url; // Set the action of the form to the delete URL
            $('#confirmationModal').modal('show'); // Show the modal
        }
    </script>
</x-app-layout>
