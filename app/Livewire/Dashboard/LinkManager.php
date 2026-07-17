<?php

namespace App\Livewire\Dashboard;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithPagination;

class LinkManager extends Component
{
    use WithPagination;

    public $editingLinkId = null;
    public $showForm = false;
    public $confirmingDelete = null;

    protected $listeners = [
        'linkSaved' => 'onLinkSaved',
        'linkCancelled' => 'onLinkCancelled',
    ];

    public function createLink()
    {
        $this->editingLinkId = null;
        $this->showForm = true;
    }

    public function editLink($linkId)
    {
        $this->editingLinkId = $linkId;
        $this->showForm = true;
    }

    public function confirmDelete($linkId)
    {
        $this->confirmingDelete = $linkId;
    }

    public function cancelDelete()
    {
        $this->confirmingDelete = null;
    }

    public function deleteLink($linkId)
    {
        $link = Link::where('user_id', auth()->id())->findOrFail($linkId);
        $link->delete();
        $this->confirmingDelete = null;
        $this->dispatch('linkDeleted');
    }

    public function toggleActive($linkId)
    {
        $link = Link::where('user_id', auth()->id())->findOrFail($linkId);
        $link->update(['is_active' => !$link->is_active]);
    }

    public function moveUp($linkId)
    {
        $link = Link::where('user_id', auth()->id())->findOrFail($linkId);
        $prev = Link::where('user_id', auth()->id())
            ->where('sort_order', '<', $link->sort_order)
            ->orderBy('sort_order', 'desc')
            ->first();

        if ($prev) {
            $temp = $link->sort_order;
            $link->update(['sort_order' => $prev->sort_order]);
            $prev->update(['sort_order' => $temp]);
        }
    }

    public function moveDown($linkId)
    {
        $link = Link::where('user_id', auth()->id())->findOrFail($linkId);
        $next = Link::where('user_id', auth()->id())
            ->where('sort_order', '>', $link->sort_order)
            ->orderBy('sort_order', 'asc')
            ->first();

        if ($next) {
            $temp = $link->sort_order;
            $link->update(['sort_order' => $next->sort_order]);
            $next->update(['sort_order' => $temp]);
        }
    }

    public function onLinkSaved()
    {
        $this->showForm = false;
        $this->editingLinkId = null;
    }

    public function onLinkCancelled()
    {
        $this->showForm = false;
        $this->editingLinkId = null;
    }

    public function render()
    {
        $links = Link::where('user_id', auth()->id())
            ->orderBy('sort_order')
            ->paginate(20);

        return view('livewire.dashboard.link-manager', [
            'links' => $links,
        ]);
    }
}
