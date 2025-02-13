<?php
namespace Custom\Todo\Livewire;

use Livewire\Component;
use Custom\Todo\Models\Todo;

class TodoCreate extends Component
{
    public $Todo_id, $name;

    protected $rules = [
        'name' => 'required|string|max:255'
    ];

    public function mount($todoId = null)
    {
        if ($todoId) {
            $todoId = Todo::findOrFail($todoId);
            $this->todo_id = $todo->id;
            $this->name = $todo->name;
        }
    }

    public function save()
    {
        $this->validate();

        Todo::updateOrCreate(
            ['id' => $this->todo_id],
            ['name' => $this->name]
        );

        return redirect()->route('todos.index');
    }

    public function render()
    {
        return view('todo::livewire.employee-create');
    }
}
