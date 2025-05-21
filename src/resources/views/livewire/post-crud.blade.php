<div class="p-4">
    <h1 class="text-2xl mb-4">Post CRUD with Livewire</h1>

    <form wire:submit.prevent="store">
        <input type="text" wire:model="title" placeholder="Title" class="border p-2 w-full mb-2">
        <textarea wire:model="content" placeholder="Content" class="border p-2 w-full mb-2"></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Save</button>
    </form>

    @if ($posts->count())
        <ul class="mt-4">
            @foreach ($posts as $post)
                <li class="border-b py-2">
                    <strong>{{ $post->title }}</strong>
                    <p>{{ $post->content }}</p>
                    <button wire:click="edit({{ $post->id }})" class="text-blue-500">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="text-red-500 ml-2">Delete</button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
