<div>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create todo</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->name }}</td>
                    <td>
                        <button wire:click="delete({{ $todo->id }})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $todos->links() }}
</div>

