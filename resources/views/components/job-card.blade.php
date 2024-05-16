@props(['job'])
<x-panel class="flex flex-col text-center">

    <div class="self-start text-sm">{{ $job->employer->name }}</div>
    <div class="py-8 ">
        <h3 class="group-hover:text-blue-400 transition-colors duration-300 text-xl font-bold">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm mt-5">{{ $job->schedule }} / {{ $job->salary }}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag size='small' :tag="$tag" />
            @endforeach
        </div>
    </div>
    <a href="/jobs/view/{{ $job->id }}"
        class=" mt-5 bg-blue-900 transition-colors duration-300 hover:bg-blue-500 rounded py-2 px-6 font-bold">See
        More</a>
</x-panel>
