<ul>
    @foreach($nav as $item)

        <li class="{{ $item['is_current'] ? 'active' : '' }} relative">
            <div class="mobile-nav-wrapper">
                @if($item['url']->value() !== null)
                    <a class="{{ $item['is_current'] ? 'underline' : '' }}" href="{{ $item['url']->value() }}" {{ $item['is_external'] ? 'target="_blank" rel="nofollow noopener"' : '' }}>
                        <span class="link-text">{{ $item['title'] }}</span>

                        @if($item['depth'] === 2 && ($showArrows ?? false))
                            <svg width="24" height="20" class="hidden lg:block arrow-icon transition-transform transition-colors duration-300 group-hover:text-white group-hover:animate-horizontalBounce">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        @endif
                    </a>
                @else
                    <span>{{ $item['title'] }}</span>
                @endif

                @if($item['children'])
                    <button type="button" class="mobile-submenu-toggle" data-target="submenu-{{ $loop->index }}">
                        <svg class="w-6 h-6 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <use xlink:href="#menu"></use>
                        </svg>
                    </button>
                @endif
            </div>

            @if($item['children'])
                <div id="submenu-{{ $loop->index }}" class="mobile-submenu-wrapper">
                    @include('partials.navigation', ['nav' => $item['children']])
                </div>
            @endif
        </li>

    @endforeach
</ul>
