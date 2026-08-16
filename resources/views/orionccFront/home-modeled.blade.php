<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orion CC | Modeled First — Digital-First Construction</title>
    <meta name="description" content="Orion Contracting Company plans every structure in 3D before the first beam goes up — commercial, industrial, and MEP work across the UAE and Saudi Arabia.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('orionFrontAssets/assets/images/favicons/favicon.webp') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('orionFrontAssets/assets/images/favicons/favicon32.webp') }}" />
    <link rel="stylesheet" href="{{ asset('orionFrontAssets/assets/css/theme-modeled.css') }}" />
</head>
<body class="modeled">

    <header class="modeled-header">
        <div class="container modeled-header__inner">
            <a href="{{ route('home.modeled') }}" class="modeled-header__brand">
                <span class="name">Orion</span>
                <span class="tag">Contracting Company</span>
            </a>

            <nav class="modeled-header__nav" id="modeledNav">
                <a href="{{ route('home.modeled') }}" class="is-active">Home</a>
                <a href="{{ route('projects.index') }}">Projects</a>
                <a href="{{ route('sectors.index') }}">Sectors</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('certificate.index') }}">Certifications</a>
                <a href="{{ route('contact') }}" class="modeled-header__cta">Contact Us</a>
            </nav>

            <button type="button" class="modeled-header__toggle" id="modeledNavToggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
            </button>
        </div>
    </header>

    <section class="modeled-hero">
        <div class="container modeled-hero__body">
            <div class="modeled-hero__copy">
                <span class="modeled-eyebrow">Digital-First Construction</span>
                <h1>Modeled first. Built right.</h1>
                <p class="modeled-hero__lede">Orion plans every structure in 3D before the first beam goes up — commercial, industrial, and MEP work across the UAE and Saudi Arabia, built to the model.</p>
                <div class="modeled-cta-row">
                    <a href="{{ route('projects.index') }}" class="modeled-btn">View Projects →</a>
                    <a href="{{ route('contact') }}" class="modeled-btn modeled-btn--ghost">Start a Project</a>
                </div>
            </div>
            <div class="modeled-massing" aria-hidden="true">
                <div class="modeled-rhombus r1"></div>
                <div class="modeled-rhombus r2"></div>
                <div class="modeled-rhombus r3"></div>
                <div class="modeled-rhombus r4"></div>
            </div>
        </div>
    </section>

    <section class="modeled-stats">
        <div class="container modeled-stats__inner">
            <dl class="stat"><dd>{{ $stats['years'] }}</dd><dt>Years Active</dt></dl>
            <dl class="stat"><dd>{{ $stats['projects'] }}</dd><dt>Projects Delivered</dt></dl>
            <dl class="stat"><dd>{{ $stats['sectors'] }}</dd><dt>Sectors Served</dt></dl>
            <dl class="stat"><dd>{{ $stats['clients'] }}</dd><dt>Clients</dt></dl>
        </div>
    </section>

    @if ($sectors->isNotEmpty())
    <section class="modeled-section modeled-section--tint">
        <div class="container">
            <div class="modeled-section__head">
                <span class="modeled-eyebrow">Capabilities</span>
                <h2>Built across every sector we serve.</h2>
                <p>From industrial plants to residential communities, each sector gets a team that already knows its codes, its materials, and its pace.</p>
            </div>
            <div class="modeled-sectors">
                @foreach ($sectors->take(6) as $sector)
                <div class="modeled-sector-card">
                    <div class="mark"></div>
                    <h3>{{ $sector->name }}</h3>
                    @if ($sector->description)
                    <p>{{ \Illuminate\Support\Str::limit($sector->description, 90) }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if ($projects->isNotEmpty())
    <section class="modeled-section">
        <div class="container">
            <div class="modeled-section__head">
                <span class="modeled-eyebrow">Recent Work</span>
                <h2>A few structures we've taken from model to handover.</h2>
            </div>
            <div class="modeled-projects">
                @foreach ($projects as $project)
                <div class="modeled-project-card">
                    <div class="modeled-project-card__image">
                        @if ($project->hasMedia('flipster'))
                        <img src="{{ $project->getFirstMediaUrl('flipster', 'flip_out') ?: $project->getFirstMediaUrl('flipster') }}" alt="{{ $project->name }}" loading="lazy">
                        @endif
                    </div>
                    <div class="modeled-project-card__body">
                        <span class="modeled-project-card__tag">{{ $project->Sector->name ?? 'Construction' }}</span>
                        <h3>{{ $project->name }}</h3>
                        <a href="{{ route('projects.show', $project->id) }}" class="link">View Project →</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="modeled-section modeled-section--tint">
        <div class="container">
            <div class="modeled-section__head">
                <span class="modeled-eyebrow">Quality, Verified</span>
                <h2>Certified to the standards we're inspected against.</h2>
            </div>
            <div class="modeled-certs">
                <a href="{{ route('certificate.index') }}" class="modeled-cert-pill"><span class="dot"></span> ISO 9001:2015 — Quality Management</a>
                <a href="{{ route('certificate.index') }}" class="modeled-cert-pill"><span class="dot"></span> ISO 14001:2015 — Environmental Management</a>
                <a href="{{ route('certificate.index') }}" class="modeled-cert-pill"><span class="dot"></span> ISO 45001:2018 — Health &amp; Safety</a>
            </div>
        </div>
    </section>

    <section class="modeled-cta-band">
        <div class="container modeled-cta-band__inner">
            <h2>Tell us the dimensions. We'll tell you what it takes.</h2>
            <a href="{{ route('contact') }}" class="modeled-btn">Start a Project →</a>
        </div>
    </section>

    <footer class="modeled-footer">
        <div class="container">
            <div class="modeled-footer__top">
                <div class="modeled-footer__brand">
                    <span class="name">Orion</span>
                    <p>{{ setting('address', 'Al Hamrah Industrial Zone, Al Jazirah Alhamra, Ras Al Khaimah, United Arab Emirates') }}</p>
                </div>
                <div class="modeled-footer__links">
                    <div>
                        <h4>Company</h4>
                        <ul>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('projects.index') }}">Projects</a></li>
                            <li><a href="{{ route('certificate.index') }}">Certifications</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4>Contact</h4>
                        <ul>
                            <li><a href="tel:{{ str_replace([' ', '+'], '', setting('phone', '+971 7 2335531')) }}">{{ setting('phone', '+971 7 2335531') }}</a></li>
                            <li><a href="mailto:{{ setting('email', 'info@orioncc.com') }}">{{ setting('email', 'info@orioncc.com') }}</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4>Follow</h4>
                        <ul>
                            <li><a href="{{ setting('linkedin', 'https://www.linkedin.com/company/orion-contracting-company-llc/') }}" target="_blank" rel="noopener">LinkedIn</a></li>
                            <li><a href="{{ setting('instagram', 'https://www.instagram.com/orioncontracting/') }}" target="_blank" rel="noopener">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modeled-footer__bottom">
                <span>&copy; {{ now()->year }} Orion Contracting Company. All rights reserved.</span>
                <a href="{{ route('home') }}">Back to main site</a>
            </div>
        </div>
    </footer>

    <script>
        (function () {
            var toggle = document.getElementById('modeledNavToggle');
            var nav = document.getElementById('modeledNav');
            if (!toggle || !nav) return;
            toggle.addEventListener('click', function () {
                var isOpen = nav.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', String(isOpen));
            });
        })();
    </script>
</body>
</html>
