@props(['active' => false])

<a
   {{ $attributes->merge([
       'class' => $active
           ? 'uppercase rounded-md bg-indigo-600 px-3 py-2
                         text-sm font-semibold text-white shadow-xs
                         hover:bg-indigo-500 focus-visible:outline-2
                         focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
           : 'uppercase rounded-md bg-gray-600 px-3 py-2
                         text-sm font-semibold text-white shadow-xs
                         hover:bg-gray-500 focus-visible:outline-2
                         focus-visible:outline-offset-2 focus-visible:outline-gray-600',
   ]) }}>
    {{ $slot }}
</a>
