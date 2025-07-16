@props(['active' => false])

<a class="{{ $active ? 'text-orange-400' : '' }} tracking-widest mx-4"
   aria-current="{{ $active ? 'page' : 'false' }}"
   {{ $attributes }}>
    {{ $slot }}
</a>
