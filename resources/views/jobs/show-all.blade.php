<x-layout>
    <h1 class="text-xxl text-center mb-5">All Jobs</h1>
    <div class="flex flex-col gap-5">
        @foreach ($jobs as $job)
        <x-job-card-wide :job="$job"/>
        @endforeach
    </div>
</x-layout>