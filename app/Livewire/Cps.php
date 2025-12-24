<?php

namespace App\Livewire;

use App\Models\CopyPaste;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cps extends Component
{
    public string $content;
    public Collection $cps;
    public function mount(): void
    {
        $this->cps = Auth::user()->copypastes;
    }
    public function add(): void
    {
        $validated = $this->validate([
            'content' => 'required|min:3'
        ]);
        $cp = new CopyPaste($validated);
        $cp->user()->associate(Auth::user());
        $cp->save();
        $this->content = '';
        $this->cps->prepend($cp);
    }
    public function render()
    {
        return view('livewire.cps');
    }
    public function delete(CopyPaste $cp): void
    {
        $cp->delete();
        $this->cps = $this->cps->reject(
            fn($item) => $item->id === $cp->id
        );
    }
}
