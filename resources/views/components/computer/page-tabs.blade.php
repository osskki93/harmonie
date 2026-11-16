@php
    $currentPage = $currentPage ?? '';
@endphp

<style>
    .computer-page-tabs {
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
        margin: 30px auto 0;
        transition: opacity 180ms ease, transform 180ms ease;
    }

    .computer-page-tabs.is-navigating {
        opacity: 0;
        transform: translateY(5px);
    }

    .computer-page-tab {
        border: 0;
        padding: 10px 18px;
        border-radius: 999px;
        color: #532514;
        background: rgba(255, 250, 243, 0.66);
        font-size: 20px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        text-decoration: none;
        transition: background 180ms ease, transform 180ms ease, color 180ms ease;
    }

    .computer-page-tab:hover,
    .computer-page-tab:focus-visible {
        background: #faf4e8;
        outline: none;
        transform: translateY(-2px);
    }

    .computer-page-tab.is-active {
        color: #faf4e8;
        background: #532514;
    }

    @media (max-width: 1100px) {
        .computer-page-tab {
            padding: 8px 14px;
            font-size: 18px;
        }
    }
</style>

<nav class="computer-page-tabs" data-computer-page-tabs aria-label="{{ __('site.mobile.menu_label') }}">
    <button type="button" class="computer-page-tab{{ $currentPage === 'home' ? ' is-active' : '' }}" data-page-tab="home">{{ __('site.nav.home') }}</button>
    <button type="button" class="computer-page-tab{{ $currentPage === 'services' ? ' is-active' : '' }}" data-page-tab="services">{{ __('site.nav.services') }}</button>
    <button type="button" class="computer-page-tab{{ $currentPage === 'about' ? ' is-active' : '' }}" data-page-tab="about">{{ __('site.nav.about') }}</button>
    <button type="button" class="computer-page-tab{{ $currentPage === 'location' ? ' is-active' : '' }}" data-page-tab="location">{{ __('site.nav.location') }}</button>
</nav>

<script>
    (() => {
        const tabs = document.querySelector('[data-computer-page-tabs]');

        if (!tabs) {
            return;
        }

        const setActiveTab = (page) => {
            document.querySelectorAll('[data-page-panel]').forEach((panel) => {
                panel.classList.toggle('is-active', panel.dataset.pagePanel === page);
            });

            tabs.querySelectorAll('[data-page-tab]').forEach((tab) => {
                tab.classList.toggle('is-active', tab.dataset.pageTab === page);
            });

            const activePanel = document.querySelector(`[data-page-panel="${page}"]`);
            if (activePanel) {
                activePanel.querySelectorAll('.about-photo, .computer-service-card').forEach((element) => {
                    element.classList.remove('is-loaded');
                    window.setTimeout(() => element.classList.add('is-loaded'), 1200);
                });
            }
        };

        tabs.querySelectorAll('[data-page-tab]').forEach((tab) => {
            tab.addEventListener('click', () => setActiveTab(tab.dataset.pageTab));
        });

        window.setComputerPage = setActiveTab;
    })();
</script>
