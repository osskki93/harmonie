<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#f6efe2">
    <title>{{ __('site.brand.name') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

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
            font-family: "Cormorant Garamond", Georgia, serif;
            color: #532514;
            min-height: 100svh;
            position: relative;
            background: #f6efe2;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to bottom, #f6efe2 0%, rgba(246, 239, 226, 0.64) 18%, rgba(246, 239, 226, 0) 34%, rgba(246, 239, 226, 0) 62%, rgba(246, 239, 226, 0.64) 78%, #f6efe2 100%),
                url("{{ asset('images/background_image.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;
        }

        .mobile-main {
            min-height: 100svh;
            padding: calc(16px + env(safe-area-inset-top)) 16px calc(16px + env(safe-area-inset-bottom));
            display: flex;
            flex-direction: column;
        }

        .mobile-topbar {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .mobile-topbar-spacer {
            width: 48px;
            height: 48px;
        }

        .expanded {
            flex: 1;
            min-height: 0;
        }

        .brand {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .brand-logo {
            width: 48px;
            height: auto;
            display: block;
        }

        .menu-toggle {
            width: 48px;
            height: 48px;
            border: 0;
            border-radius: 999px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 0;
            background: rgba(250, 244, 232, 0.88);
            color: #532514;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(83, 37, 20, 0.05);
        }

        .menu-toggle span {
            display: block;
            width: 16px;
            height: 1.8px;
            border-radius: 999px;
            background: currentColor;
        }

        .mobile-menu {
            position: fixed;
            top: calc(16px + env(safe-area-inset-top) + 56px);
            right: 16px;
            z-index: 20;
            min-width: 168px;
            padding: 10px;
            border-radius: 20px;
            background: rgba(255, 250, 243, 0.96);
            box-shadow: 0 18px 40px rgba(83, 37, 20, 0.18);
            opacity: 0;
            transform: translateY(-8px) scale(0.98);
            pointer-events: none;
            transition: opacity 220ms ease, transform 220ms ease;
        }

        .mobile-menu.is-open {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .mobile-menu a {
            display: block;
            padding: 12px 14px;
            border-radius: 14px;
            color: #532514;
            text-decoration: none;
            font-size: 22px;
            line-height: 1;
            font-weight: 600;
            cursor: pointer;
        }

        .mobile-menu a + a {
            margin-top: 4px;
        }

        .mobile-menu a:hover,
        .mobile-menu a:focus-visible {
            background: rgba(83, 37, 20, 0.06);
            outline: none;
        }

        .brand-name {
            margin-top: 32px;
            font-size: 40px;
            line-height: 1;
            letter-spacing: 0.04em;
            color: #532514;
            align-self: center;
            text-align: center;
            letter-spacing: 0.2em;
        }

        .headline-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .headline {
            margin: 0;
            font-size: 40px;
            line-height: 1.08;
            font-weight: 500;
            color: #532514;
            text-align: center;
        }

        .bottom-actions {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
        }

        .action-btn {
            border: 0;
            width: 60vw;
            padding: 15px 18px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            color: #532514;
            background: #faf4e8;
            cursor: pointer;
        }

        .contact-actions {
            width: 60vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-icon-btn {
            width: 56px;
            height: 56px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #532514;
            background: #faf4e8;
        }

        .contact-icon {
            width: 24px;
            height: 24px;
            stroke: currentColor;
            overflow: visible;
        }

        .contact-icon-fill {
            width: 24px;
            height: 24px;
            fill: currentColor;
            overflow: visible;
        }

        body {
            overflow: hidden;
        }

        .tablet-home {
            height: 100svh;
            min-height: 0;
            padding: calc(20px + env(safe-area-inset-top)) clamp(28px, 6vw, 80px) calc(18px + env(safe-area-inset-bottom));
            display: grid;
            grid-template-rows: auto auto auto minmax(0, 1fr) auto auto;
            gap: clamp(10px, 1.7vh, 22px);
        }

        .tablet-home .mobile-topbar {
            justify-content: flex-start;
        }

        .tablet-home .mobile-topbar .menu-toggle {
            margin-left: auto;
        }

        .tablet-home .language-toggle {
            width: 54px;
            height: 54px;
            margin-left: auto;
            border: 0;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            color: #532514;
            background: rgba(250, 244, 232, 0.88);
            box-shadow: 0 2px 5px rgba(83, 37, 20, 0.05);
            cursor: pointer;
        }

        .tablet-home .language-toggle-icon {
            width: 27px;
            height: 27px;
        }

        .tablet-home .mobile-menu-language {
            margin-top: 0;
            padding-top: 0;
            border-top: 0;
        }

        .tablet-home .brand-logo {
            width: clamp(54px, 7vw, 72px);
        }

        .tablet-home .brand-name {
            margin-top: 0;
            font-size: clamp(48px, 7vw, 76px);
            letter-spacing: 0.34em;
            text-indent: 0.34em;
        }

        .tablet-home .headline-wrap {
            min-height: 0;
        }

        .tablet-home .headline {
            max-width: 760px;
            font-size: clamp(38px, 5.2vw, 62px);
            letter-spacing: 0.08em;
            line-height: 1.02;
        }

        .tablet-services {
            min-height: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 8px;
        }

        .tablet-services-grid {
            width: min(100%, 920px);
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .tablet-service-tab {
            display: block;
            position: relative;
            min-height: clamp(92px, 12vh, 142px);
            overflow: hidden;
            padding: 0;
            border: 0;
            border-radius: 18px;
            color: #532514;
            background: #faf4e8;
            box-shadow: 0 10px 24px rgba(83, 37, 20, 0.12);
            cursor: pointer;
            text-align: left;
            text-decoration: none;
            font: inherit;
        }

        .tablet-service-tab:last-child {
            grid-column: 1 / -1;
            min-height: clamp(76px, 10vh, 118px);
        }

        .tablet-service-tab img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tablet-service-tab::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(246, 239, 226, 0.88), rgba(246, 239, 226, 0.04) 72%);
        }

        .tablet-service-tab span {
            position: absolute;
            z-index: 1;
            right: 14px;
            bottom: 12px;
            left: 14px;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(22px, 2.7vw, 34px);
            font-weight: 600;
            line-height: 1;
        }

        .tablet-service-tab:focus-visible,
        .tablet-service-tab.is-active {
            outline: 2px solid #532514;
            outline-offset: 3px;
        }

        .tablet-about-panel {
            width: 80%;
            max-width: 760px;
            min-height: clamp(116px, 15vh, 156px);
            justify-self: center;
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
            gap: 24px;
            padding: 18px 28px;
            border-radius: 18px;
            background: rgba(255, 250, 243, 0.78);
            box-shadow: 0 8px 20px rgba(83, 37, 20, 0.08);
        }

        .tablet-about-photo {
            width: 86px;
            height: 86px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center 26%;
        }

        .tablet-about-copy {
            min-width: 0;
        }

        .tablet-about-title {
            margin: 0;
            font-size: clamp(23px, 2.7vw, 32px);
            line-height: 1;
        }

        .tablet-about-text {
            margin: 4px 0 0;
            font-size: clamp(18px, 2vw, 23px);
            line-height: 1.12;
        }

        .tablet-home .tablet-contact-actions {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: clamp(24px, 4vw, 48px);
            margin: 0 auto;
        }

        .tablet-home .tablet-contact-actions .contact-icon-btn {
            width: clamp(62px, 7.5vw, 82px);
            height: clamp(62px, 7.5vw, 82px);
        }

        .tablet-home-contacts {
            display: flex;
            justify-content: center;
        }

        @media (orientation: landscape) {
            body {
                overflow-y: auto;
            }

            .tablet-home {
                height: auto;
                min-height: 100svh;
                grid-template-rows: auto auto auto auto auto auto;
                gap: 18px;
            }

            .tablet-services {
                min-height: auto;
            }

            .tablet-service-tab {
                min-height: 150px;
            }

            .tablet-service-tab:last-child {
                min-height: 120px;
            }
        }

        @media (min-width: 1024px) and (orientation: landscape) {
            body {
                overflow: hidden;
            }

            .tablet-home {
                width: min(100%, 1440px);
                height: 100svh;
                min-height: 0;
                margin: 0 auto;
                padding: 22px clamp(44px, 6vw, 110px) 20px;
                grid-template-rows: auto auto auto minmax(0, 1fr) auto auto;
                gap: clamp(8px, 1.1vh, 16px);
            }

            .tablet-home .mobile-topbar {
                min-height: 52px;
            }

            .tablet-home .brand-logo {
                width: 56px;
            }

            .tablet-home .language-toggle {
                width: 50px;
                height: 50px;
            }

            .tablet-home .language-toggle-icon {
                width: 24px;
                height: 24px;
            }

            .tablet-home .brand-name {
                font-size: clamp(48px, 5vw, 78px);
                letter-spacing: 0.38em;
                text-indent: 0.38em;
            }

            .tablet-home .headline {
                max-width: 900px;
                font-size: clamp(36px, 4vw, 62px);
                letter-spacing: 0.1em;
            }

            .tablet-services-grid {
                width: min(100%, 1120px);
                gap: 14px;
            }

            .tablet-service-tab {
                min-height: clamp(82px, 13vh, 122px);
            }

            .tablet-service-tab:last-child {
                min-height: clamp(64px, 9vh, 92px);
            }

            .tablet-service-tab span {
                font-size: clamp(20px, 2vw, 30px);
            }

            .tablet-about-panel {
                width: 60%;
                max-width: 720px;
                min-height: clamp(92px, 13vh, 122px);
                gap: 18px;
                padding: 12px 22px;
            }

            .tablet-about-photo {
                width: 68px;
                height: 68px;
            }

            .tablet-about-title {
                font-size: clamp(21px, 2vw, 28px);
            }

            .tablet-about-text {
                font-size: clamp(16px, 1.5vw, 20px);
            }

            .tablet-home .tablet-contact-actions {
                gap: 34px;
            }

            .tablet-home .tablet-contact-actions .contact-icon-btn {
                width: 64px;
                height: 64px;
            }
        }

        .computer-home {
            width: min(100% - 96px, 1480px);
            height: 100svh;
            min-height: 0;
            margin: 0 auto;
            padding: 28px 0 24px;
            display: grid;
            grid-template-rows: auto minmax(0, 1fr);
            gap: 24px;
        }

        .computer-home .mobile-topbar {
            min-height: 52px;
        }

        .computer-home .brand-logo {
            width: 58px;
        }

        .computer-home .language-toggle {
            width: 50px;
            height: 50px;
        }

        .computer-home .language-toggle-icon {
            width: 24px;
            height: 24px;
        }

        .computer-triptych {
            min-height: 0;
            display: grid;
            grid-template-columns: minmax(230px, 0.78fr) minmax(440px, 1.44fr) minmax(230px, 0.78fr);
            align-items: stretch;
            gap: 0;
        }

        .computer-hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            min-width: 0;
            padding: 0 clamp(28px, 3vw, 54px) 0 0;
            border-right: 1px solid rgba(83, 37, 20, 0.15);
        }

        .computer-home .brand-name {
            margin: 0;
            align-self: flex-start;
            font-size: clamp(58px, 6vw, 104px);
            line-height: 0.9;
            letter-spacing: 0.22em;
            text-indent: 0.22em;
            text-align: left;
        }

        .computer-home .headline-wrap {
            display: block;
            margin-top: clamp(26px, 4vh, 54px);
        }

        .computer-home .headline {
            max-width: 560px;
            font-size: clamp(42px, 4.2vw, 72px);
            line-height: 0.98;
            letter-spacing: 0.04em;
            text-align: left;
        }

        .computer-services {
            min-width: 0;
            display: flex;
            align-items: center;
            padding: 0 clamp(28px, 3vw, 54px);
        }

        .computer-services .tablet-services-grid {
            width: 100%;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .computer-services .tablet-service-tab {
            min-height: clamp(142px, 20vh, 220px);
            border-radius: 22px;
        }

        .computer-services .tablet-service-tab:last-child {
            min-height: clamp(96px, 13vh, 140px);
        }

        .computer-services .tablet-service-tab span {
            right: 20px;
            bottom: 18px;
            left: 20px;
            font-size: clamp(24px, 2.2vw, 38px);
        }

        .computer-aside {
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 26px;
            padding: 0 0 0 clamp(28px, 3vw, 54px);
            border-left: 1px solid rgba(83, 37, 20, 0.15);
        }

        .computer-about-panel {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            min-width: 0;
            text-align: center;
        }

        .computer-about-panel .tablet-about-photo {
            width: 68px;
            height: 68px;
            flex: 0 0 auto;
        }

        .computer-about-panel .tablet-about-title {
            font-size: 28px;
        }

        .computer-about-panel .tablet-about-text {
            max-width: 300px;
            font-size: 19px;
            line-height: 1.18;
        }

        .computer-home .tablet-home-contacts {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .computer-home .tablet-contact-actions {
            width: auto;
            gap: 24px;
        }

        .computer-home .tablet-contact-actions .contact-icon-btn {
            width: 62px;
            height: 62px;
        }

        @media (max-width: 1180px) {
            .computer-home {
                width: min(100% - 56px, 1100px);
            }

            .computer-triptych {
                grid-template-columns: minmax(190px, 0.72fr) minmax(380px, 1.56fr) minmax(190px, 0.72fr);
            }

            .computer-home .brand-name {
                font-size: 54px;
            }
        }

        @media (min-width: 1024px) and (orientation: landscape) {
            .computer-home {
                width: 100%;
                padding: 22px 24px 20px;
            }

            .computer-triptych {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .computer-services {
                grid-column: 1;
                grid-row: 1;
                padding: 0 24px 0 0;
                border-right: 1px solid rgba(83, 37, 20, 0.15);
            }

            .computer-hero {
                grid-column: 2;
                grid-row: 1;
                align-items: center;
                padding: 0 24px;
                border-right: 0;
            }

            .computer-hero .brand-name,
            .computer-hero .headline {
                align-self: center;
                text-align: center;
            }

            .computer-aside {
                grid-column: 3;
                grid-row: 1;
                padding-left: 24px;
            }

            .computer-home .brand-name {
                font-size: clamp(42px, 4.2vw, 68px);
                letter-spacing: 0.16em;
                text-indent: 0.16em;
            }

            .computer-home .headline {
                max-width: 360px;
                font-size: clamp(34px, 3.2vw, 54px);
                letter-spacing: 0.02em;
            }

            .computer-home .headline-wrap {
                margin-top: clamp(76px, 10vh, 132px);
            }

            .computer-services .tablet-services-grid {
                grid-template-columns: 1fr;
                width: 82%;
                gap: 26px;
            }

            .computer-services .tablet-service-tab {
                min-height: clamp(96px, 12.5vh, 136px);
                border-radius: 18px;
            }

            .computer-services .tablet-service-tab:last-child {
                grid-column: auto;
                min-height: clamp(96px, 12.5vh, 136px);
            }

            .computer-services .tablet-service-tab span {
                right: 14px;
                bottom: 13px;
                left: 14px;
                font-size: clamp(18px, 1.5vw, 25px);
            }

            .computer-about-panel .tablet-about-photo {
                width: clamp(108px, 9vw, 142px);
                height: clamp(108px, 9vw, 142px);
            }

            .computer-about-panel .tablet-about-title {
                font-size: clamp(28px, 2.5vw, 38px);
            }

            .computer-about-panel .tablet-about-text {
                max-width: 360px;
                font-size: clamp(20px, 1.7vw, 26px);
                line-height: 1.2;
            }
        }

        .tablet-service-dialog {
            width: min(680px, calc(100vw - 80px));
            max-height: calc(100svh - 48px);
            padding: 0;
            border: 0;
            border-radius: 24px;
            overflow: hidden;
            color: #532514;
            background: rgba(255, 250, 243, 0.97);
            box-shadow: 0 24px 60px rgba(83, 37, 20, 0.25);
        }

        .tablet-service-dialog::backdrop {
            background: rgba(34, 18, 10, 0.44);
            backdrop-filter: blur(4px);
        }

        .tablet-service-dialog-inner {
            max-height: calc(100svh - 48px);
            overflow-y: auto;
            padding: 30px 36px;
        }

        .tablet-service-dialog-title {
            margin: 0;
            font-size: clamp(34px, 4vw, 48px);
            line-height: 1;
        }

        .tablet-service-dialog-price {
            margin: 10px 0 0;
            font-size: 26px;
            font-weight: 600;
        }

        .tablet-service-dialog-text {
            margin: 18px 0 0;
            font-size: clamp(21px, 2.5vw, 27px);
            line-height: 1.34;
            text-align: justify;
            white-space: pre-line;
        }

        .tablet-service-dialog-close {
            margin-top: 16px;
            width: fit-content;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
            border-radius: 999px;
            padding: 8px 14px;
            background: transparent;
            color: #532514;
            font-family: inherit;
            font-size: 20px;
            font-weight: 600;
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 4px;
            outline: none;
            box-shadow: none;
            -webkit-tap-highlight-color: transparent;
        }

        .tablet-service-dialog-close:focus,
        .tablet-service-dialog-close:focus-visible,
        .tablet-service-dialog-close:active {
            outline: none;
            box-shadow: none;
        }

        @media (orientation: portrait) and (max-height: 850px) {
            .tablet-home {
                gap: 8px;
            }

            .tablet-home .brand-name {
                font-size: 48px;
            }

            .tablet-home .headline {
                font-size: 38px;
            }

            .tablet-service-tab {
                min-height: 84px;
            }
        }
    </style>
</head>
<body>
    @php
        $currentPage = 'home';
        $serviceList = __('site.services.list');
        $tabletServices = [
            ['name' => $serviceList[0]['name'], 'price' => $serviceList[0]['price'], 'text' => $serviceList[0]['text'], 'image' => 'hairstrokes_after.png'],
            ['name' => $serviceList[1]['name'], 'price' => $serviceList[1]['price'], 'text' => $serviceList[1]['text'], 'image' => 'magic_shading_after.png'],
            ['name' => $serviceList[2]['name'], 'price' => $serviceList[2]['price'], 'text' => $serviceList[2]['text'], 'image' => 'soft_liner_1.png'],
            ['name' => $serviceList[3]['name'], 'price' => $serviceList[3]['price'], 'text' => $serviceList[3]['text'], 'image' => 'eyeliner_classic_1.png'],
            ['name' => __('site.services.consultation.title'), 'price' => '30CHF', 'text' => __('site.services.consultation.text'), 'image' => 'consultation_and_design.jpg'],
        ];
    @endphp

    <main class="mobile-main tablet-home computer-home">
        @include('components.mobile.topbar-menu', [
            'currentPage' => $currentPage,
            'menuId' => 'mobile-menu',
            'topbarClass' => 'mobile-topbar',
            'menuClass' => 'mobile-menu',
            'toggleClass' => 'language-toggle',
            'languageOnly' => true,
        ])

        <div class="computer-triptych">
            <section class="computer-hero">
                <div class="brand">
                    <div class="brand-name">{{ strtoupper(__('site.brand.name')) }}</div>
                </div>

                <div class="headline-wrap">
                    <h1 class="headline">{{ __('site.home.headline_mobile') }}</h1>
                </div>
            </section>

            <section class="tablet-services computer-services" aria-label="{{ __('site.services.title') }}">
                <div class="tablet-services-grid">
                    @foreach($tabletServices as $service)
                        <button type="button" class="tablet-service-tab" data-service-name="{{ $service['name'] }}" data-service-price="{{ $service['price'] }}" data-service-text="{{ $service['text'] }}" aria-label="{{ $service['name'] }}">
                            <img src="{{ asset('images/'.$service['image']) }}" alt="{{ $service['name'] }}" loading="lazy">
                            <span>{{ $service['name'] }}</span>
                        </button>
                    @endforeach
                </div>
            </section>

            <aside class="computer-aside">
                <section class="computer-about-panel" aria-label="{{ __('site.about.mobile_card_label') }}">
                <img class="tablet-about-photo" src="{{ asset('images/me.png') }}" alt="Maria" loading="lazy">
                <div class="tablet-about-copy">
                    <h2 class="tablet-about-title">{{ __('site.nav.about') }}</h2>
                    <p class="tablet-about-text">{{ __('site.about.intro') }}</p>
                    <p class="tablet-about-text">{{ __('site.about.mobile_text') }}</p>
                </div>
                </section>

                <section class="tablet-home-contacts">
                    @include('components.mobile.contact-links', [
                        'wrapperClass' => 'tablet-contact-actions',
                    ])
                </section>
            </aside>
        </div>
    </main>

    <dialog class="tablet-service-dialog" data-service-dialog>
        <div class="tablet-service-dialog-inner">
            <h2 class="tablet-service-dialog-title" data-dialog-title></h2>
            <p class="tablet-service-dialog-price" data-dialog-price></p>
            <p class="tablet-service-dialog-text" data-dialog-text></p>
            <button type="button" class="tablet-service-dialog-close" data-dialog-close>{{ __('site.mobile.close') }}</button>
        </div>
    </dialog>

    <script>
        (() => {
            const toggle = document.querySelector('[data-menu-toggle]');
            const menu = document.querySelector('[data-mobile-menu]');
            const menuLinks = document.querySelectorAll('[data-menu-link]');
            const currentPage = @json($currentPage);

            if (!toggle || !menu) {
                return;
            }

            const setOpen = (open) => {
                menu.classList.toggle('is-open', open);
                toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            };

            toggle.addEventListener('click', () => {
                setOpen(!menu.classList.contains('is-open'));
            });

            const navigateAfterClose = (url) => {
                setOpen(false);
                window.setTimeout(() => {
                    window.location.href = url;
                }, 220);
            };

            menuLinks.forEach((link) => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();

                    const target = link.dataset.menuTarget || '';

                    if (target === currentPage) {
                        setOpen(false);
                        return;
                    }

                    navigateAfterClose(link.href);
                });
            });

            document.addEventListener('click', (event) => {
                if (!menu.classList.contains('is-open')) {
                    return;
                }

                if (menu.contains(event.target) || toggle.contains(event.target)) {
                    return;
                }

                setOpen(false);
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setOpen(false);
                }
            });
        })();
    </script>

    <script>
        (() => {
            const dialog = document.querySelector('[data-service-dialog]');
            const dialogInner = document.querySelector('.tablet-service-dialog-inner');
            const title = document.querySelector('[data-dialog-title]');
            const price = document.querySelector('[data-dialog-price]');
            const text = document.querySelector('[data-dialog-text]');
            const close = document.querySelector('[data-dialog-close]');
            const serviceCards = document.querySelectorAll('[data-service-name]');

            serviceCards.forEach((card) => {
                card.addEventListener('click', () => {
                    title.textContent = card.dataset.serviceName || '';
                    price.textContent = card.dataset.servicePrice || '';
                    text.textContent = card.dataset.serviceText || '';
                    dialogInner.scrollTop = 0;
                    dialog.showModal();
                });
            });

            close.addEventListener('click', () => dialog.close());
            dialog.addEventListener('click', (event) => {
                if (event.target === dialog) {
                    dialog.close();
                }
            });
        })();
    </script>

</body>
</html>