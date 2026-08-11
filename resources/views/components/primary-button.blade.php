<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150 bg-[#0A1628] text-[#F4F8FB] hover:bg-[#16273F] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#7FE7FF] focus-visible:ring-offset-2']) }}
    style="clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 0 100%);">
    {{ $slot }}
</button>
