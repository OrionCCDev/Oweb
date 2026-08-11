@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#7FE7FF] focus:ring-[#7FE7FF] rounded-md shadow-sm']) !!}>
