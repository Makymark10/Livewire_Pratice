<?php

namespace App\Livewire;

use App\Models\posts;
use Livewire\Component;

class ModalTest extends Component
{
    public $showModal = false;
    public $showSecondModal = false;
    public $title = '';
    public $category = '';
    public $content = '';

    public function goToSecondModal()
    {
        $this->showModal = false;
        $this->showSecondModal = true;
    }

    public function save()
    {
        posts::create([
            'title' => $this->title,
            'category' => $this->category,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'category', 'content']);
        $this->showSecondModal = false;
        $this->showModal = false;

        $this->dispatch('postAdded');
    }

    public function render()
    {
        return view('livewire.modal-test');
    }
}
