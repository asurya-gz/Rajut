@props([
    'size' => 'md',
    'color' => 'pink',
    'text' => null,
    'overlay' => false
])

@php
$sizeClasses = [
    'sm' => 'w-4 h-4',
    'md' => 'w-6 h-6', 
    'lg' => 'w-8 h-8',
    'xl' => 'w-12 h-12'
];

$colorClasses = [
    'pink' => 'text-pink-500',
    'white' => 'text-white',
    'gray' => 'text-gray-500'
];

$spinnerSize = $sizeClasses[$size] ?? $sizeClasses['md'];
$spinnerColor = $colorClasses[$color] ?? $colorClasses['pink'];
@endphp

@if($overlay)
<!-- Full screen overlay -->
<div class="fixed inset-0 bg-black/20 backdrop-blur-sm z-50 flex items-center justify-center">
    <div class="bg-white rounded-2xl p-8 shadow-2xl border border-pink-100">
        <div class="flex flex-col items-center space-y-4">
            <!-- Animated spinner -->
            <div class="relative">
                <div class="{{ $spinnerSize }} {{ $spinnerColor }}">
                    <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <!-- Pulsing background circle -->
                <div class="absolute inset-0 {{ $spinnerSize }} bg-pink-100 rounded-full animate-ping opacity-20"></div>
            </div>
            
            @if($text)
                <div class="text-center">
                    <p class="text-gray-700 font-medium">{{ $text }}</p>
                    <div class="flex space-x-1 mt-2 justify-center">
                        <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                        <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                        <div class="w-2 h-2 bg-pink-400 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@else
<!-- Inline spinner -->
<div class="flex items-center space-x-2" {{ $attributes }}>
    <div class="relative">
        <div class="{{ $spinnerSize }} {{ $spinnerColor }}">
            <svg class="animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    </div>
    @if($text)
        <span class="text-sm font-medium text-gray-600">{{ $text }}</span>
    @endif
</div>
@endif