<div>
    <p>{{ $content }}</p>
    <flux:field>
        <flux:label>New CopyPaste</flux:label>

        <flux:description>The content to be saved.</flux:description>

        <flux:textarea wire:model.defer="content" />
        <flux:button wire:click="add">Save</flux:button>

        <flux:error name="content" />
    </flux:field>
    <ul>
        @foreach ($cps as $item)
            <p>{{ $item->content }}</p>
            <flux:button variant="primary" x-data x-on:click="navigator.clipboard.writeText('{{ $item->content }}')">Copy</flux:button>
            <flux:button variant="danger" wire:click="delete({{ $item->id }})">Delete</flux:button>
        @endforeach
    </ul>

</div>
