<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                <h3 class="font-weight-bold">Edit Note</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('notes.update', $note->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="font-weight-bold">Note Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $note->title) }}" placeholder="Note Title" required class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="body" class="font-weight-bold">Note Body</label>
                        <textarea id="body" name="body" placeholder="Note Body" required class="form-control" rows="4">{{ old('body', $note->body) }}</textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Note</button>
                    </div>
                </form>

                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
