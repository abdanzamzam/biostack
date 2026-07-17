<?php

namespace App\Livewire\Dashboard;

use App\Models\Link;
use Livewire\Component;

class LinkForm extends Component
{
    public $linkId = null;
    public $type = 'link';
    public $title = '';
    public $url = '';
    public $icon = '';
    public $image = '';
    public $content = '';
    public $is_active = true;
    public $starts_at = '';
    public $ends_at = '';

    public $linkTypes = [
        'link' => '🔗 Link',
        'social' => '🌐 Social Media',
        'image' => '🖼️ Image',
        'text' => '📝 Text',
        'divider' => '➖ Divider',
    ];

    protected $rules = [
        'type' => 'required|in:link,social,image,text,divider',
        'title' => 'required_unless:type,divider|max:255',
        'url' => 'required_if:type,link,social|nullable|url|max:2048',
        'icon' => 'nullable|max:255',
        'image' => 'nullable|max:2048',
        'content' => 'nullable|max:65535',
        'is_active' => 'boolean',
        'starts_at' => 'nullable|date',
        'ends_at' => 'nullable|date|after_or_equal:starts_at',
    ];

    public function mount($linkId = null)
    {
        if ($linkId) {
            $link = Link::where('user_id', auth()->id())->findOrFail($linkId);
            $this->linkId = $link->id;
            $this->type = $link->type;
            $this->title = $link->title;
            $this->url = $link->url;
            $this->icon = $link->icon;
            $this->image = $link->image;
            $this->content = $link->content;
            $this->is_active = $link->is_active;
            $this->starts_at = $link->starts_at?->format('Y-m-d\TH:i');
            $this->ends_at = $link->ends_at?->format('Y-m-d\TH:i');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if ($this->type === 'divider') {
            $this->title = '─';
        }

        $maxOrder = Link::where('user_id', auth()->id())->max('sort_order') ?? 0;

        $data = [
            'type' => $this->type,
            'title' => $this->title,
            'url' => $this->url ?: null,
            'icon' => $this->icon ?: null,
            'image' => $this->image ?: null,
            'content' => $this->content ?: null,
            'is_active' => $this->is_active,
            'starts_at' => $this->starts_at ?: null,
            'ends_at' => $this->ends_at ?: null,
        ];

        if ($this->linkId) {
            $link = Link::where('user_id', auth()->id())->findOrFail($this->linkId);
            $link->update($data);
            $this->dispatch('linkSaved');
        } else {
            $data['sort_order'] = $maxOrder + 1;
            $data['user_id'] = auth()->id();
            Link::create($data);
            $this->dispatch('linkSaved');
        }
    }

    public function cancel()
    {
        $this->dispatch('linkCancelled');
    }

    public function render()
    {
        return view('livewire.dashboard.link-form');
    }
}
