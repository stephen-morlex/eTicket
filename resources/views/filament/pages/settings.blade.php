<div>
    <x-filament::app-header :title="__($title)" />

    <x-filament::app-content>
    @foreach ($categories as $item)
        <h1>{{ $item->name }}</h1>
    @endforeach
    </x-filament::app-content>
</div>
