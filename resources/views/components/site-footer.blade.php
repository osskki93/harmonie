<footer class="site-footer" id="contact" data-reveal>
    <div class="container footer-grid">
        <div>
            <h2>{{ __('site.contact.title') }}</h2>
            <p>{{ __('site.contact.appointment_only') }}</p>
            <p>{{ __('site.contact.address') }}</p>
        </div>

        <div class="contact-actions" aria-label="{{ __('site.contact.title') }}">
            <a
                href="tel:+41772571313"
                class="contact-action"
            
                aria-label="{{ __('site.contact.phone_label') }}"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="contact-action-icon" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.64 2.63a2 2 0 0 1-.45 2.11L8.03 9.73a16 16 0 0 0 6.24 6.24l1.27-1.27a2 2 0 0 1 2.11-.45c.85.31 1.73.52 2.63.64A2 2 0 0 1 22 16.92Z"/>
                </svg>
                <span class="sr-only">{{ __('site.contact.phone_label') }}</span>
            </a>
            <a
                href="https://instagram.com/mariallop_pmuzurich"
                target="_blank"
                rel="noopener noreferrer"
                class="contact-action"
                aria-label="{{ __('site.contact.instagram_label') }}"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="contact-action-icon" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="5" ry="5"/>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37Z"/>
                    <path d="M17.5 6.5h.01"/>
                </svg>
                <span class="sr-only">{{ __('site.contact.instagram_label') }}</span>
            </a>
            <a
                href="mailto:mllopoliver21@gmail.com"
                class="contact-action"
                aria-label="{{ __('site.contact.email_label') }}"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" class="contact-action-icon" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/>
                    <path d="m22 7-10 7L2 7"/>
                </svg>
                <span class="sr-only">{{ __('site.contact.email_label') }}</span>
            </a>
        </div>
    </div>
    <div class="contact-toast" data-contact-toast aria-live="polite" role="status"></div>
</footer>
