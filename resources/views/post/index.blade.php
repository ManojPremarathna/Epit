<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="flex w-full justify-between pb-6">
                    <div>Posts</div>
                    <div>
                        <a href="{{ route('posts.create') }}" class="bg-green-500 p-2 px-6 text-white rounded-full"> + Add
                            new Post</a>
                    </div>
                </div>

                <div>
                    {{-- Or we can use pass msg and status --}}
                    @if (session('status') === 'post-saved')
                        <div class="p-3 my-3 bg-green-100 rounded">
                            New post Saved...
                        </div>
                    @endif

                    @if (session('status') === 'post-updated')
                        <div class="p-3 my-3 bg-green-100 rounded">
                            Post Updated...
                        </div>
                    @endif

                    @if (session('status') === 'post-deleted')
                        <div class="p-3 my-3 bg-red-100 rounded">
                            Post Deleted...
                        </div>
                    @endif

                    <table class="table-fixed w-full border-collapse border border-slate-200">
                        <thead>
                            <tr>
                                <th class="border border-slate-200 p-2 bg-slate-400">Name</th>
                                <th class="border border-slate-200 p-2 bg-slate-400">Created At</th>
                                <th class="border border-slate-200 p-2 bg-slate-400">Created By</th>
                                <th class="border border-slate-200 p-2 bg-slate-400">Updated By</th>
                                <th class="border border-slate-200 p-2 bg-slate-400">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border border-slate-200 p-2">{{ $post->name }}</td>
                                    {{-- Just Example, We can format dates using carbon --}}
                                    <td class="border border-slate-200 p-2">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                    <td class="border border-slate-200 p-2">{{ $post->createdBy->name }}</td>
                                    <td class="border border-slate-200 p-2">
                                        {{ $post->updatedBy ? $post->updatedBy->name : ' ' }}</td>

                                    <td class="border border-slate-200 p-2">
                                        <div class="flex gap-2">
                                            <div>
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="rounded bg-green-600 px-3 py-1 text-white">View</a>
                                            </div>
                                            <div>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="rounded bg-blue-600 px-3 py-1 text-white">Edit</a>

                                            </div>
                                            <div>
                                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="rounded bg-red-600 px-3 py-1 text-white"
                                                        onclick="event.preventDefault();
                                                            this.closest('form').submit();">Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pt-4">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
