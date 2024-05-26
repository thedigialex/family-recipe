<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-3 py-2 bg-accent hover:bg-darkaccent text-text hover:text-hoverText font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
