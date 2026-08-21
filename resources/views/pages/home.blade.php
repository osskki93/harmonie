<x-site-layout :title="__('site.brand.name').' | '.__('site.brand.tagline')" :description="__('site.home.paragraph_1')">
    <section class="hero" data-reveal>
        <div class="container hero-grid">
            <div class="hero-copy reveal-left" data-reveal>
                <p class="eyebrow">{{ __('site.brand.subtitle') }}</p>
                <h1>{{ __('site.home.headline') }}</h1>
                <p>{{ __('site.home.paragraph_1') }}</p>
                <p>{{ __('site.home.paragraph_2') }}</p>
                <div class="hero-actions">
                    <a href="https://wa.me/41772571313" target="_blank" rel="noopener noreferrer" class="btn-primary">
                        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" width="18" height="18" fill="currentColor">
                            <path d="M19.05 4.91A9.82 9.82 0 0 0 12.03 2C6.56 2 2.11 6.44 2.1 11.92c0 1.75.46 3.46 1.32 4.96L2 22l5.27-1.38a9.9 9.9 0 0 0 4.74 1.21h.01c5.47 0 9.92-4.45 9.92-9.92A9.86 9.86 0 0 0 19.05 4.91Zm-7.02 15.24h-.01a8.2 8.2 0 0 1-4.18-1.14l-.3-.18-3.13.82.84-3.05-.2-.31a8.25 8.25 0 0 1-1.27-4.37c0-4.55 3.7-8.25 8.26-8.25 2.2 0 4.27.85 5.83 2.42a8.18 8.18 0 0 1 2.41 5.84c0 4.56-3.7 8.26-8.25 8.26Zm4.52-6.17c-.25-.12-1.47-.72-1.7-.8-.23-.08-.39-.12-.56.12-.16.25-.64.8-.78.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-2-1.25-.74-.66-1.24-1.48-1.39-1.73-.14-.25-.01-.38.11-.5.11-.11.25-.29.37-.43.12-.15.16-.25.25-.41.08-.17.04-.31-.02-.43-.06-.12-.56-1.35-.77-1.85-.2-.48-.4-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.23.25-.87.85-.87 2.07 0 1.22.89 2.4 1.01 2.57.12.16 1.74 2.66 4.22 3.73.59.26 1.06.41 1.42.52.6.19 1.14.16 1.57.1.48-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.15-1.18-.06-.1-.23-.17-.48-.29Z"/>
                        </svg>
                        <span>{{ __('site.home.cta_primary') }}</span>
                    </a>
                    <a href="{{ route('services') }}" class="btn-secondary">{{ __('site.home.cta_secondary') }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-band" data-reveal>
        <div class="container feature-grid">
            <article class="feature-card" data-reveal>
                <h2>{{ __('site.features.natural_result_title') }}</h2>
                <p>{{ __('site.features.natural_result_text') }}</p>
            </article>
            <article class="feature-card" data-reveal>
                <h2>{{ __('site.features.safety_first_title') }}</h2>
                <p>{{ __('site.features.safety_first_text') }}</p>
            </article>
            <article class="feature-card" data-reveal>
                <h2>{{ __('site.features.personal_guidance_title') }}</h2>
                <p>{{ __('site.features.personal_guidance_text') }}</p>
            </article>
        </div>
    </section>

    <section class="faq" data-reveal>
        <div class="container faq-wrap">
            <div class="section-title-row faq-heading" data-reveal>
                <p class="eyebrow">{{ __('site.faq.eyebrow') }}</p>
                <h2>{{ __('site.faq.title') }}</h2>
            </div>

            <div class="faq-list">
                @foreach (__('site.faq.items') as $item)
                    <details class="faq-item" data-reveal>
                        <summary>{{ $item['question'] }}</summary>
                        <p>{{ $item['answer'] }}</p>
                    </details>
                @endforeach
            </div>
        </div>
    </section>
</x-site-layout>
