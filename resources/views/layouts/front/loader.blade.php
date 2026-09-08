{{-- Preloader: the three glyphs of the OCC mark bouncing in a wave.
     Styles live in public/orionFrontAssets/assets/css/site-loader.css. The
     logo comes through site_logo_url() so an admin-uploaded logo is used
     when one is set, passed as a custom property because the URL isn't
     known to the CSS. Sits above the home page's video intro and reveals
     it once the page has loaded. --}}
<div class="site-loader" id="siteLoader" aria-hidden="true"
     style="--loader-logo: url('{{ site_logo_url('web', 'orionFrontAssets/assets/images/resources/logo-white.webp') }}')">
    <div class="site-loader__glyphs">
        <span></span><span></span><span></span>
    </div>
    <span class="site-loader__tagline"></span>
</div>

<script>
    // Hide the preloader once the page has loaded, but never before MIN_SHOW
    // has passed: it stays up for a moment on purpose to give the page (and
    // the home intro video) time to buffer behind it. The CSS carries its
    // own timed failsafe as well, so a blocked script can never leave the
    // overlay covering the site.
    (function () {
        var loader = document.getElementById('siteLoader');
        if (!loader) return;

        var MIN_SHOW = 2500;   // ms the loader is guaranteed to stay on screen
        var shownAt = Date.now();
        var done = false;

        var hide = function () {
            if (done) return;
            done = true;
            loader.classList.add('is-hidden');
            // lets the home intro know it can start its video now
            window.siteLoaderHidden = true;
            document.dispatchEvent(new CustomEvent('site-loader:hidden'));
        };
        var hideAfterMin = function () {
            setTimeout(hide, Math.max(300, MIN_SHOW - (Date.now() - shownAt)));
        };

        if (document.readyState === 'complete') {
            hideAfterMin();
        } else {
            window.addEventListener('load', hideAfterMin);
        }

        setTimeout(hide, 5000);
        // coming back via the bfcache restores the old DOM, loader included
        window.addEventListener('pageshow', function (e) { if (e.persisted) hide(); });
    })();
</script>
