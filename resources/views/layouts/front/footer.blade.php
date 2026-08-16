<!--Site Footer Start-->
<footer class="site-footer">
    <div class="site-footer__bg"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/backgrounds/site-footer-bg-img.png') }});background-repeat: repeat;background-size: 350px;">
    </div>
    <div class="site-footer__ripped-paper"
        style="background-image: url({{ asset('orionFrontAssets/assets/images/shapes/site-footer-ripped-paper.png') }});">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="{{ route('home') }}"><img
                                    src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp') }}"
                                    alt=""></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">{{ setting('footer.tagline', "We Build Your Vision Into Reality") }}</p>
                        </div>
                        <div class="footer-widget__social-box">
                            <a href="{{ setting('facebook', 'https://www.facebook.com/orioncontractingcompany/') }}" target="_blank" rel="noopener"><i class="fab fa-facebook"></i></a>
                            <a href="{{ setting('instagram', 'https://www.instagram.com/orioncontracting/') }}" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                            <a href="{{ setting('linkedin', 'https://www.linkedin.com/company/orion-contracting-company-llc/') }}" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__explore">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Explore</h3>
                        </div>
                        <div class="footer-widget__explore-list-box">
                            <ul class="footer-widget__explore-list list-unstyled">
                                <li><a href="{{ route('about') }}">About Company</a></li>
                                <li><a href="{{ route('sectors.index') }}">Our Sectors</a></li>
                                <li><a href="{{ route('certificate.index') }}">Certifications</a></li>
                                <li><a href="{{ route('projects.index') }}">Projects</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__contact">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Contact</h3>
                        </div>
                        <p class="footer-widget__contact-text">{{ setting('address', 'Al Hamrah Industrial Zone Al Jazirah Alhamra – Ras al Khaimah – United Arab Emirates') }}
                        </p>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <div class="text">
                                    <p><a href="tel:{{ str_replace([' ', '+'], '', setting('phone', '+971 7 2335531')) }}">
                                            {{ setting('phone', '+971 7 2335531') }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="text">
                                    <p><a href="mailto:{{ setting('email', 'info@orioncc.com') }}">{{ setting('email', 'info@orioncc.com') }}</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__gallery">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Gallery</h3>
                        </div>
                        @php
                            $footerGalleryImages = \App\Models\GalleryImage::orderBy('sort_order')->orderBy('id')->take(6)->get();
                            $footerStaticImages = ['Picture1.jpg', 'Picture10.png', 'Picture12.png', 'Picture32.jpg', 'Picture212.jpg', 'Picture3.jpg'];
                        @endphp
                        <ul class="footer-widget__gallery-list list-unstyled clearfix">
                            @forelse ($footerGalleryImages as $footerImage)
                                <li>
                                    <div class="footer-widget__gallery-img">
                                        @if ($footerImage->hasMedia('image'))
                                        <img src="{{ $footerImage->getFirstMediaUrl('image') }}" alt="{{ $footerImage->caption }}">
                                        @endif
                                        <a href="{{ route('projects.index') }}"><span class="fa fa-link"></span></a>
                                    </div>
                                </li>
                            @empty
                                @foreach ($footerStaticImages as $footerStaticImage)
                                <li>
                                    <div class="footer-widget__gallery-img">
                                        <img src="{{ asset('orionFrontAssets/assets/images/project/' . $footerStaticImage) }}" alt="">
                                        <a href="{{ route('projects.index') }}"><span class="fa fa-link"></span></a>
                                    </div>
                                </li>
                                @endforeach
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <div class="site-footer__bottom-left">
                            <p class="site-footer__bottom-text">© Copyright {{ now()->year }} by <a href="{{ route('home') }}">Orion</a>
                            </p>
                        </div>
                        <div class="site-footer__bottom-right">
                            <ul class="list-unstyled site-footer__bottom-menu">
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->
</div><!-- /.page-wrapper -->

<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="{{ route('home') }}" aria-label="logo image"><img
                    src="{{ asset('orionFrontAssets/assets/images/resources/logo-white.webp') }}" width="104"
                    alt="" /></a>
        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@orioncc.com">info@orioncc.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:97172335531">+971 7 2335531</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
                <a href="https://www.facebook.com/orioncontractingcompany"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"><i
                        class="fab fa-linkedin"></i></a>
                <a href="https://www.youtube.com/@orioncontracting9881"><i class="fab fa-youtube"></i></a>
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>

@yield('cust_js')
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Orion Contracting Company",
        "description": "Leading construction and contracting experts with 15+ years of experience specializing in commercial, industrial and residential projects across United Arab Emirates And Saudi Arabia",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('orionFrontAssets/assets/images/resources/logo-blue.webp') }}",
        "foundingDate": "2008",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Al-Hamra Industrial Area",
            "addressLocality": "Ras Al Khaimah",
            "addressRegion": "Ras Al Khaimah",
            "addressCountry": "AE"
        },
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+971-7-2335531",
            "contactType": "customer service",
            "email": "info@orioncc.com",
            "areaServed": ["AE", "SA"],
            "availableLanguage": ["English", "Arabic"]
        }],
        "sameAs": [
            "https://www.facebook.com/orioncontractingcompany",
            "https://www.linkedin.com/company/orion-contracting-company-llc/mycompany/"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Construction Services",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Commercial Construction"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Industrial Construction"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "MEP Services"
                    }
                }
            ]
        }
    }
    </script>

    <!-- Essential scripts for mobile menu -->
    <script src="{{ asset('orionFrontAssets/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/js/main.js') }}"></script>
    <script src="{{ asset('orionFrontAssets/assets/js/custom-effects.js') }}" defer></script>

    <!-- Direct mobile menu initialization -->
    <script>
        (function() {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initMobileMenu);
            } else {
                initMobileMenu();
            }

            function initMobileMenu() {
                // Copy menu items from main menu to mobile menu if empty
                if (document.querySelector(".main-menu__list") && document.querySelector(".mobile-nav__container")) {
                    let mobileNavContainer = document.querySelector(".mobile-nav__container");
                    if (!mobileNavContainer.innerHTML.trim()) {
                        let navContent = document.querySelector(".main-menu__list").outerHTML;
                        mobileNavContainer.innerHTML = navContent;
                    }
                }

                // Set up dropdown toggles in mobile menu
                if (document.querySelector(".mobile-nav__container .main-menu__list")) {
                    let dropdownAnchors = document.querySelectorAll(".mobile-nav__container .main-menu__list .dropdown > a, .mobile-nav__container .main-menu__list > li > a");

                    dropdownAnchors.forEach(function(anchor) {
                        // Only add toggle button if it doesn't already exist
                        if (!anchor.querySelector('button')) {
                            let toggleBtn = document.createElement("BUTTON");
                            toggleBtn.setAttribute("aria-label", "dropdown toggler");
                            toggleBtn.innerHTML = "<i class='fa fa-angle-down'></i>";
                            anchor.appendChild(toggleBtn);

                            toggleBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                this.classList.toggle("expanded");
                                this.parentNode.classList.toggle("expanded");

                                let subMenu = anchor.parentNode.querySelector('ul');
                                if (subMenu) {
                                    if (subMenu.style.display === "block") {
                                        subMenu.style.display = "none";
                                    } else {
                                        subMenu.style.display = "block";
                                    }
                                }
                            });
                        }
                    });
                }

                // Set up mobile nav toggler
                let mobileNavTogglers = document.querySelectorAll(".mobile-nav__toggler");
                mobileNavTogglers.forEach(function(toggler) {
                    toggler.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.querySelector(".mobile-nav__wrapper").classList.toggle("expanded");
                        document.body.classList.toggle("locked");
                    });
                });

                // Set up mobile nav close
                let mobileNavClose = document.querySelector(".mobile-nav__close");
                if (mobileNavClose) {
                    mobileNavClose.addEventListener('click', function(e) {
                        e.preventDefault();
                        document.querySelector(".mobile-nav__wrapper").classList.remove("expanded");
                        document.body.classList.remove("locked");
                    });
                }
            }
        })();
    </script>
</body>


</html>
