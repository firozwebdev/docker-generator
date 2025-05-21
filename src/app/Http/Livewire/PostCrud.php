<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostCrud extends Component
{
    public $posts, $title, $content, $postId;

    public function render()
    {
        $this->posts = Post::latest()->get();

        return view('livewire.post-crud')->layout('layouts.app');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::updateOrCreate(['id' => $this->postId], [
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function delete($id)
    {
        Post::findOrFail($id)->delete();
    }

    private function resetFields()
    {
        $this->postId = null;
        $this->title = '';
        $this->content = '';
    }
}
