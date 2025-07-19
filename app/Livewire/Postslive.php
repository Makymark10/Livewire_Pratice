<?php

namespace App\Livewire;

use App\Models\posts;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class Postslive extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $query = '';
    public $filter = '';

    protected $listeners = ['postAdded' => '$refresh'];

    public function render()
    {
        $postsQuery = posts::query()
            ->where(function($q) {
                $q->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->query) . '%'])
                  ->orWhereRaw('LOWER(content) LIKE ?', ['%' . strtolower($this->query) . '%']);
            });

        if ($this->filter) {
            $postsQuery->where('category', $this->filter);
        }

        return view('livewire.postslive', [
            'posts' => $postsQuery->paginate(10),
            // cursorPaginate(5) used for cursor pagination for better performance. To use that, remove the WithoutUrlPagination trait
        ]);
    }
}
