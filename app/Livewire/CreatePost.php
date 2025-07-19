<?php

namespace App\Livewire;

use App\Models\posts;
use Livewire\Component;
use App\Livewire\Forms\PostForm;

class CreatePost extends Component
{

    public PostForm $form;

    public function save() {
        $this->form->validate();
        posts::create([
            'title' => $this->form->title,
            'content' => $this->form->content,
        ]);
        $this->form->reset();
        session()->flash('message', 'Post created successfully!');

    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
