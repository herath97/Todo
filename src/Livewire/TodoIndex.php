<?php

namespace Custom\Todo\Livewire;

use Livewire\Component;
use Custom\Todo\Models\Todo;
use Livewire\WithPagination;

class TodoIndex extends Component
{
    use WithPagination;

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('todo::livewire.todo-index', [
            'todos' => Todo::latest()->paginate(5)
        ]);
    }
}
