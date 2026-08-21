<x-site-layout :title="__('site.nav.about').' | '.__('site.brand.name')" :description="__('site.about.intro')">
    <section class="about-section" data-reveal>
        <div class="container about-grid">
            <div>
                <p class="eyebrow">Harmonie</p>
                <h1>{{ __('site.about.title') }}</h1>
                <p>{{ __('site.about.intro') }}</p>
                <p>{{ __('site.about.text_1') }}</p>
            </div>

            <div class="portrait-wrap">
                <img src="{{ asset('images/me.png') }}" alt="Maria" loading="lazy" class="portrait">
            </div>
        </div>
    </section>

    <section class="about-section soft" data-reveal>
        <div class="container text-block">
            <h2>{{ __('site.about.values_title') }}</h2>
            <p>{{ __('site.about.values_text') }}</p>
        </div>
    </section>

    <section class="about-section" data-reveal>
        <div class="container text-block">
            <h2>{{ __('site.about.qualifications_title') }}</h2>
            <p>{{ __('site.about.qualifications_text_1') }}</p>
            <p>{{ __('site.about.qualifications_text_2') }}</p>
            <p>{{ __('site.about.qualifications_text_3') }}</p>
        </div>
    </section>
</x-site-layout>
