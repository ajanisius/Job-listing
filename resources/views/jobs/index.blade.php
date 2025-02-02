<x-layout>
    <div class="space-y-10">

        <section class="text-center pt-10">
            <h1 class="font-bold text-4xl">Let's Find your next Job !</h1>

            <x-forms.form method="GET" action="/search" class="mt-6">
                <x-forms.input name='q' :label=false type='text'
                    placeholder="Web Developer..." />
                <x-forms.button type='submit'>Search</x-forms.button>
            </x-forms.form>

        </section>

        <section class="pt-10">

            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <?php
                $count = 0;
                ?>
                @foreach ($featured_jobs as $job)
                    @if ($job->featured === 1)
                        <?php $count++; ?>
                        <x-job-card :job="$job" />
                        <?php if($count === 6):?>
                        <?php break; ?>
                        <?php endif?>
                    @endif
                @endforeach

            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                @foreach ($tags as $tag)
                    <x-tag :tag="$tag" />
                @endforeach

            </div>
        </section>

        <section>
            <div class="mt-6 space-y-6">
                <x-section-heading>Recent Jobs</x-section-heading>
                @foreach ($jobs as $job)
                    <x-job-card-wide :job="$job" />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
