@props(['active' => false])

<div
     class="{{ $active ? 'text-orange-300 border-2 border-current' : 'border-2 border-transparent' }} uppercase hover:text-orange-300 rounded-md tracking-widest transition-colors duration-300">
    <a class="px-2"
       aria-current="{{ $active ? 'page' : 'false' }}"
       {{ $attributes }}>
        {{ $slot }}
    </a>
</div>
