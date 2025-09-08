<a
   {{ $attributes->class([
       "rounded-md bg-blue-600 px-3 py-2 text-sm
       font-semibold text-white shadow-xs hover:bg-blue-500
       focus-visible:outline-2 focus-visible:outline-offset-2
       focus-visible:outline-blue-600 uppercase tracking-wider",
   ]) }}>
    {{ $slot }}
</a>
