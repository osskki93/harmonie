<x-site-layout :title="__('site.nav.services').' | '.__('site.brand.name')" :description="__('site.services.description')">
    <section class="page-head" data-reveal>
        <div class="container">
            <h1>{{ __('site.services.title') }}</h1>
            <p>{{ __('site.services.description') }}</p>
        </div>
    </section>

    <section class="services-list">
        <div class="container cards-stack">
            @foreach (__('site.services.list') as $service)
                <article class="service-card" data-reveal>
                    <header>
                        <h2>{{ $service['name'] }}</h2>
                        <p class="price">{{ $service['price'] }}</p>
                    </header>

                    <p>{{ $service['text'] }}</p>

                    <div class="service-gallery cols-{{ count($service['images']) }}">
                        @foreach ($service['images'] as $image)
                            @php
                                $publicImagePath = 'images/'.basename((string) $image['path']);
                            @endphp
                            <figure>
                                <img src="{{ asset($publicImagePath) }}" alt="{{ $service['name'] }} {{ __('site.services.'.$image['label']) }}" loading="lazy">
                                <figcaption>{{ __('site.services.'.$image['label']) }}</figcaption>
                            </figure>
                        @endforeach
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-site-layout>
