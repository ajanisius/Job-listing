<?php $classes = 'cursor-pointer p-5 bg-white/5 rounded-xl  border border-transparent hover:border-blue-700 transition-colors duration-300 group'; ?>
<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
