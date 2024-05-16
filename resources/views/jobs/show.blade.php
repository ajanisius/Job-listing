<x-layout>
    <div>
        <div class="border-b border-white/10 mb-10">
            <x-page-heading>{{ $job->title }}</x-page-heading>
        </div>
        <div class="flex justify-between">
            <div class="flex-col w-500">
                <p class="px-10">{{ $job->description }}</p>
            </div>
            <div class="flex w-full items-start justify-center">
                <div class="flex flex-col">
                    <div class="flex flex-col gap-4 items-start justify-center">
                        <p><strong>Employer:</strong> {{ $job->employer->name }}</p>
                        <p><strong>Salary:</strong> {{ $job->salary }}</p>
                        <p><strong>Schedule:</strong> {{ $job->schedule }}</p>
                        <p><strong>Location:</strong> {{ $job->location }}</p>
                        <div class="flex gap-3"><strong>Tags:</strong>
                            @foreach ($job->tags as $tag)
                                <p
                                    class="bg-white/10 hover:bg-white/20 rounded-xl font-bold transition-colors duration-300 px-3 py-1 text-2xs">
                                    {{ $tag->name }}</p>
                            @endforeach
                        </div>
                    </div>
                    <x-forms.divider />
                    <div class="flex gap-4 text-center flex-col">
                        <a href="{{ $job->url }}" target="_blank"
                            class="bg-blue-600 transition-colors hover:bg-blue-500 duration-300 rounded py-2 px-6 font-bold">Apply</a>
                        @auth
                            @can('edit-job', $job)
                                <a href="/jobs/{{ $job->id }}/edit"
                                    class="bg-blue-800 transition-colors duration-300 hover:bg-blue-700 rounded py-2 px-6 font-bold">Edit</a>
                                <form method="POST" action="/jobs/view/{{ $job->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="bg-red-800 transition-colors duration-300 hover:bg-red-700 rounded py-2 px-6 font-bold">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
