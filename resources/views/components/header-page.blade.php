<div {{ $attributes->merge(['class' => 'flex justify-center items-center h-[10vh]']) }}>
    <h1 {{ $attributes->merge(['class' => 'text-4xl text-gray-300']) }}>{{ $slot }}</h1>
</div>
