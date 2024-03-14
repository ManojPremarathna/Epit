<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="flex w-full justify-between pb-6">
                    <div>Posts > View Post</div>

                    <div>
                        <a href="{{ route('posts.index') }}" class="bg-slate-500 p-2 px-6 text-white rounded-full">
                            < Back to Posts List</a>
                    </div>
                </div>

                <div>
                    <table class="table-fixed w-auto w-full border-collapse border border-slate-200">
                        <thead>
                            <tr>
                                <th class="border border-slate-200 p-2">Name</th>
                                <td class="border border-slate-200 p-2">{{ $post->name }}</td>
                            </tr>
                            <tr>
                                <th class="border border-slate-200 p-2">Description</th>
                                <td class="border border-slate-200 p-2">{{ $post->description }}</td>
                            </tr>
                            <tr>
                                <th class="border border-slate-200 p-2">Created At</th>
                                <td class="border border-slate-200 p-2">{{ $post->created_at }}</td>
                            </tr>
                            <tr>
                                <th class="border border-slate-200 p-2">Created By</th>
                                <td class="border border-slate-200 p-2">{{ $post->createdBy->name }}</td>
                            </tr>
                            @if ($post->updatedBy)
                                <tr>
                                    <th class="border border-slate-200 p-2">Updated By</th>
                                    <td class="border border-slate-200 p-2">{{ $post->updatedBy->name }}</td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-200 p-2">Updated At</th>
                                    <td class="border border-slate-200 p-2">{{ $post->updated_at }}</td>
                                </tr>
                            @endif
                        </thead>


                    </table>
                </div>

                <div class="flex justify-end py-3 gap-2">
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="rounded bg-blue-600 px-3 py-1 text-white">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
