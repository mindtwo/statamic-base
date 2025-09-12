@if(count($availableSites) > 1)
    <div class="language-menu">
        <div
            x-data="{
                open: false,
                toggle() {
                    if (this.open) {
                        return this.close()
                    }

                    this.$refs.button.focus()
                    this.open = true
                },
                close(focusAfter) {
                    if (! this.open) return
                    this.open = false
                    focusAfter && focusAfter.focus()
                }
            }"
            x-on:keydown.escape.prevent.stop="close($refs.button)"
            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
            x-id="['language-dropdown']"
            class="relative"
        >
            <!-- Language Button -->
            <button
                x-ref="button"
                x-on:click="toggle()"
                :aria-expanded="open"
                :aria-controls="$id('language-dropdown')"
                type="button"
                class="flex items-center gap-2 text-white"
                aria-label="{{ trans('base.select_language') }}"
            >
                <span>{{ strtoupper($site->handle) }}</span>
                <svg class="w-4 h-4 transition-transform" :class="open && 'rotate-180'" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Language Panel -->
            <div
                x-ref="panel"
                x-show="open"
                x-transition.origin.top.left
                x-on:click.outside="close($refs.button)"
                :id="$id('language-dropdown')"
                x-cloak
                class="absolute right-0 top-full min-w-48 rounded-lg shadow-lg mt-2 z-50 origin-top-right bg-white p-1.5 outline-none border border-gray-200"
                role="menu"
                aria-orientation="vertical"
            >
                @foreach($availableSites as $siteHandle => $siteData)
                    @php
                        $isCurrent = $site->handle === $siteHandle;
                        $translatedUrl = $siteData['url'];
                    @endphp
                    <a
                        href="{{ $translatedUrl }}"
                        class="px-3 py-2 w-full flex items-center justify-between rounded-md transition-colors text-left text-sm hover:bg-gray-50 focus-visible:bg-gray-50 {{ $isCurrent ? 'bg-gray-100 text-black' : 'text-black' }}"
                        role="menuitem"
                        aria-current="{{ $isCurrent ? 'page' : 'false' }}"
                        hreflang="{{ $siteData['locale'] }}"
                        lang="{{ $siteData['locale'] }}"
                        x-on:click="close($refs.button)"
                    >
                        <span>{{ $siteData['name'] }}</span>
                        @if($isCurrent)
                            <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif
