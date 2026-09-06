<style>
    :root {
        --tablet-ink: #532514;
        --tablet-paper: #faf4e8;
        --tablet-bg: #f6efe2;
    }

    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0;
        width: 100%;
        min-height: 100%;
    }

    body {
        min-height: 100svh;
        overflow-x: hidden;
        color: var(--tablet-ink);
        font-family: "Cormorant Garamond", Georgia, serif;
        background: var(--tablet-bg);
    }

    body::before {
        content: "";
        position: fixed;
        inset: 0;
        z-index: -1;
        background-image:
            linear-gradient(to bottom, #f6efe2 0%, rgba(246, 239, 226, 0.52) 16%, rgba(246, 239, 226, 0) 38%, rgba(246, 239, 226, 0) 62%, rgba(246, 239, 226, 0.52) 84%, #f6efe2 100%),
            url("{{ asset('images/background_image.jpg') }}");
        background-position: center;
        background-size: cover;
    }

    .tablet-main {
        width: min(100% - 64px, 1080px);
        min-height: 100svh;
        margin: 0 auto;
        padding: calc(24px + env(safe-area-inset-top)) 0 calc(28px + env(safe-area-inset-bottom));
    }

    .tablet-topbar {
        display: grid;
        grid-template-columns: 64px 1fr 64px;
        align-items: center;
        gap: 24px;
        min-height: 64px;
    }

    .tablet-topbar .brand-logo {
        width: 58px;
        height: auto;
    }

    .tablet-topbar .menu-toggle,
    .tablet-topbar .services-menu-toggle {
        width: 56px;
        height: 56px;
        justify-self: end;
    }

    .tablet-topbar .menu-toggle span,
    .tablet-topbar .services-menu-toggle span {
        width: 19px;
        height: 2px;
    }

    .tablet-title-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .tablet-title {
        margin: 0;
        font-size: clamp(38px, 5vw, 58px);
        line-height: 1;
        font-weight: 600;
        letter-spacing: 0.02em;
    }

    .mobile-menu,
    .services-mobile-menu {
        right: max(32px, calc((100vw - 1080px) / 2));
        top: calc(24px + env(safe-area-inset-top) + 70px);
        min-width: 230px;
        padding: 12px;
    }

    .mobile-menu a,
    .services-mobile-menu a {
        position: fixed;
        z-index: 20;
        padding: 14px 16px;
        font-size: 25px;
    }

        border-radius: 20px;
        background: rgba(255, 250, 243, 0.97);
        box-shadow: 0 18px 40px rgba(83, 37, 20, 0.18);
        opacity: 0;
        transform: translateY(-8px) scale(0.98);
        pointer-events: none;
        transition: opacity 220ms ease, transform 220ms ease;
    }

    .mobile-menu.is-open,
    .services-mobile-menu.is-open {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }

    .mobile-menu a,
    .services-mobile-menu a {
        display: block;
        margin: 0;
    .mobile-menu-language a,
    .tablet-contact-actions {
        border-radius: 14px;
        color: var(--tablet-ink);
        text-decoration: none;
        width: 220px;
        line-height: 1;
        font-weight: 600;
    }

    .mobile-menu a + a,
    .services-mobile-menu a + a {
        margin-top: 4px;
    }

    .mobile-menu a:hover,
    .mobile-menu a:focus-visible,
    .services-mobile-menu a:hover,
    .services-mobile-menu a:focus-visible {
        background: rgba(83, 37, 20, 0.06);
        outline: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .tablet-contact-actions .contact-icon-btn {
        width: 60px;
        height: 60px;
    }

    .tablet-home {
        display: grid;
        grid-template-rows: auto 1fr auto;
        gap: 32px;
    }

    .tablet-home-brand {
        align-self: center;
        text-align: center;
    }

    .tablet-brand-name {
        margin-top: 4vh;
        font-size: clamp(58px, 9vw, 104px);
        line-height: 0.95;
        letter-spacing: 0.18em;
        text-indent: 0.18em;
    }

    .tablet-headline-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 8vw;
    }

    .tablet-headline {
        max-width: 760px;
        margin: 0;
        font-size: clamp(48px, 6.5vw, 78px);
        line-height: 1.02;
        font-weight: 500;
        text-align: center;
    }

    .tablet-home-actions {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 18px;
        padding-bottom: 2vh;
    }

    .tablet-action-btn {
        width: min(360px, 45vw);
        padding: 18px 24px;
        border-radius: 999px;
        color: var(--tablet-ink);
        background: var(--tablet-paper);
        font-size: 30px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
    }

    .tablet-about-card {
        width: min(760px, 100%);
        margin: clamp(56px, 10vh, 120px) auto 28px;
        padding: 42px 56px;
        border-radius: 30px;
        background: rgba(255, 250, 243, 0.84);
        box-shadow: 0 18px 44px rgba(83, 37, 20, 0.12);
        text-align: center;
    }

    .tablet-about-photo {
        width: 148px;
        height: 148px;
        margin: 0 auto 18px;
        border: 2px solid rgba(83, 37, 20, 0.08);
        border-radius: 50%;
        object-fit: cover;
        object-position: center 26%;
    }

    .tablet-about-name {
        margin: 0;
        font-size: 48px;
        line-height: 1;
    }

    .tablet-about-text {
        max-width: 600px;
        margin: 18px auto 0;
        font-size: 28px;
        line-height: 1.25;
    }

    .tablet-about-actions {
        display: flex;
        justify-content: center;
        padding-bottom: 12px;
    }

    .tablet-services-stack {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 22px;
        margin-top: 48px;
    }

    .tablet-service-tile {
        min-height: clamp(260px, 35vw, 390px);
        position: relative;
        overflow: hidden;
        padding: 0;
        border: 0;
        border-radius: 24px;
        background: var(--tablet-paper);
        box-shadow: 0 16px 34px rgba(83, 37, 20, 0.12);
        color: var(--tablet-ink);
        cursor: pointer;
    }

    .tablet-service-tile:last-child {
        grid-column: 1 / -1;
        min-height: clamp(230px, 28vw, 320px);
    }

    .tablet-service-tile img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tablet-service-tile::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(246, 239, 226, 0.82), rgba(246, 239, 226, 0.04) 62%);
    }

    .tablet-service-name {
        position: absolute;
        z-index: 1;
        right: 24px;
        bottom: 20px;
        left: 24px;
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(30px, 3vw, 46px);
        font-weight: 600;
        line-height: 1;
        text-align: left;
    }

    .tablet-service-dialog {
        width: min(680px, calc(100vw - 64px));
        max-height: calc(100svh - 48px);
        padding: 0;
        border: 0;
        border-radius: 28px;
        overflow: hidden;
        color: var(--tablet-ink);
        background: rgba(255, 250, 243, 0.97);
        box-shadow: 0 24px 60px rgba(83, 37, 20, 0.25);
    }

    .tablet-dialog-inner {
        max-height: calc(100svh - 48px);
        overflow-y: auto;
        padding: 34px 40px;
    }

    .tablet-dialog-title {
        margin: 0;
        font-size: 46px;
        line-height: 1;
    }

    .tablet-dialog-price {
        margin: 12px 0 0;
        font-size: 28px;
        font-weight: 600;
    }

    .tablet-dialog-text {
        margin: 22px 0 0;
        font-size: 26px;
        line-height: 1.35;
        text-align: justify;
        white-space: pre-line;
    }

    .tablet-dialog-close {
        display: block;
        margin: 24px auto 0;
        border: 0;
        padding: 8px 14px;
        color: var(--tablet-ink);
        background: transparent;
        font: 600 24px inherit;
        text-decoration: underline;
    }

    @media (max-width: 700px) {
        .tablet-main {
            width: min(100% - 32px, 560px);
        }

        .tablet-services-stack {
            grid-template-columns: 1fr;
        }

        .tablet-service-tile:last-child {
            grid-column: auto;
        }

        .tablet-about-card {
            padding: 30px 24px;
        }
    }
</style>
