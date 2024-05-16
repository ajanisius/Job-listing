@props(['job'])
<x-panel class="flex gap-x-6">
    <div class="flex-1 flex flex-col">
        <a class="self-start text-sm text-gray-500">{{ $job->employer->name }}</a>
        <h3 class="font-bold text-xl group-hover:text-blue-400 transition-colors duration-300 ">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} / {{ $job->salary }}</p>
    </div>

    <div class="flex flex-col items-end justify-between">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :tag="$tag" />
            @endforeach
        </div>
        <a href="/jobs/view/{{ $job->id }}"
            class=" mt-5 bg-blue-900 transition-colors duration-300 hover:bg-blue-500 rounded-xl py-1 px-4 font-bold">See
            More</a>
    </div>

</x-panel>
