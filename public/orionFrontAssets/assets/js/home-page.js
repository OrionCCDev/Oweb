/**
 * Home Page Optimized Scripts
 * Extracted from inline scripts for better performance and caching
 */

(function() {
    'use strict';

    // Lazy loading function with IntersectionObserver
    function initLazyLoading() {
        const priorityImages = [].slice.call(document.querySelectorAll(".feature-one img.lazy, .main-slider img.lazy"));
        const projectImages = [].slice.call(document.querySelectorAll(".hot-products__img img.lazy"));
        const otherImages = [].slice.call(document.querySelectorAll("img.lazy:not(.hot-products__img img):not(.feature-one img):not(.main-slider img)"));

        if ("IntersectionObserver" in window) {
            const observerOptions = {
                rootMargin: '50px'
            };

            // Observer for priority images (load immediately)
            const priorityImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        if (lazyImage.dataset.src) {
                            lazyImage.src = lazyImage.dataset.src;
                        }
                        if(lazyImage.dataset.srcset) {
                            lazyImage.srcset = lazyImage.dataset.srcset;
                        }
                        lazyImage.classList.add("loaded");
                        priorityImageObserver.unobserve(lazyImage);
                    }
                });
            }, observerOptions);

            // Observer for project images (load with slight delay)
            const projectImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        requestAnimationFrame(() => {
                            if (lazyImage.dataset.src) {
                                lazyImage.src = lazyImage.dataset.src;
                            }
                            if(lazyImage.dataset.srcset) {
                                lazyImage.srcset = lazyImage.dataset.srcset;
                            }
                            lazyImage.classList.add("loaded");
                        });
                        projectImageObserver.unobserve(lazyImage);
                    }
                });
            }, observerOptions);

            // Observer for other images
            const lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        if (lazyImage.dataset.src) {
                            lazyImage.src = lazyImage.dataset.src;
                        }
                        if(lazyImage.dataset.srcset) {
                            lazyImage.srcset = lazyImage.dataset.srcset;
                        }
                        lazyImage.classList.add("loaded");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            }, observerOptions);

            // Load priority images first
            priorityImages.forEach(lazyImage => priorityImageObserver.observe(lazyImage));

            // Load project images
            projectImages.forEach(lazyImage => projectImageObserver.observe(lazyImage));

            // Load other images
            otherImages.forEach(lazyImage => lazyImageObserver.observe(lazyImage));
        } else {
            // Fallback for browsers without IntersectionObserver
            const allLazyImages = [...priorityImages, ...projectImages, ...otherImages];
            allLazyImages.forEach(function(lazyImage) {
                if (lazyImage.dataset.src) {
                    lazyImage.src = lazyImage.dataset.src;
                }
                if(lazyImage.dataset.srcset) {
                    lazyImage.srcset = lazyImage.dataset.srcset;
                }
                lazyImage.classList.add("loaded");
            });
        }
    }

    // Video initialization optimized
    function initHeroVideo() {
        const videoContainer = document.getElementById('hero-slider-sect');
        if (!videoContainer || !document.createElement('video').canPlayType) {
            return;
        }

        const video = document.createElement('video');
        video.setAttribute('muted', 'muted');
        video.setAttribute('loop', 'loop');
        video.setAttribute('autoplay', 'autoplay');
        video.setAttribute('playsinline', 'playsinline');
        video.setAttribute('id', 'background-video');
        video.muted = true;
        video.playsInline = true;
        video.autoplay = true;
        video.loop = true;
        video.preload = 'auto';

        // Set responsive video styles
        const setVideoHeight = () => {
            const height = window.innerWidth <= 400 ? '50vh' :
                          window.innerWidth <= 900 ? '70vh' : '100vh';
            const objectFit = window.innerWidth <= 900 ? 'fill' : 'cover';

            video.style.cssText = `display:block;z-index:0;height:${height};width:100%;object-fit:${objectFit};position:absolute;top:0;left:0;`;
            videoContainer.style.height = height;
            videoContainer.style.minHeight = height;

            const overlay = document.getElementById('video-overlay');
            if (overlay) overlay.style.height = height;
        };

        setVideoHeight();
        window.addEventListener('resize', setVideoHeight, { passive: true });

        // Create video source
        const source = document.createElement('source');
        source.src = videoContainer.dataset.videoSrc || '';
        source.type = "video/mp4";
        video.appendChild(source);
        videoContainer.prepend(video);

        // Simplified autoplay with fallback
        const playPromise = video.play();
        if (playPromise !== undefined) {
            playPromise.catch(() => {
                // Show play button on mobile if autoplay fails
                if (/Android|webOS|iPhone|iPad|iPod/i.test(navigator.userAgent)) {
                    const playBtn = document.createElement('div');
                    playBtn.style.cssText = 'position:absolute;z-index:10;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(0,0,0,0.6);color:white;border-radius:50%;cursor:pointer;width:70px;height:70px;display:flex;align-items:center;justify-content:center;';
                    playBtn.innerHTML = '<i class="fa fa-play" style="font-size:24px;"></i>';
                    playBtn.onclick = () => {
                        video.play();
                        playBtn.remove();
                    };
                    videoContainer.appendChild(playBtn);
                }
            });
        }
    }

    // Initialize Swiper sliders
    function initSliders() {
        if (typeof Swiper === 'undefined') return;

        // Certificate slider
        const certSlider = document.querySelector('.certificates-slider');
        if (certSlider && certSlider.dataset.swiperOptions) {
            try {
                const options = JSON.parse(certSlider.dataset.swiperOptions.replace(/'/g, '"'));
                new Swiper('.certificates-slider', options);
            } catch (e) {
                console.error('Certificate slider init failed:', e);
            }
        }

        // Sectors slider
        const sectorsSlider = document.querySelector('.sectors-slider');
        if (sectorsSlider && sectorsSlider.dataset.swiperOptions) {
            try {
                const options = JSON.parse(sectorsSlider.dataset.swiperOptions.replace(/'/g, '"'));
                new Swiper('.sectors-slider', options);
            } catch (e) {
                console.error('Sectors slider init failed:', e);
            }
        }
    }

    // Load particles.js asynchronously
    function loadParticles() {
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js';
        script.async = true;
        script.onload = function() {
            if (typeof particlesJS !== 'undefined') {
                particlesJS("particles-js", {
                    particles: {
                        number: { value: 60, density: { enable: true, value_area: 800 } },
                        color: { value: "#aef490" },
                        shape: { type: "star" },
                        opacity: { value: 0.5 },
                        size: { value: 3, random: true },
                        line_linked: { enable: true, distance: 150, color: "#fff", opacity: 0.4, width: 1 },
                        move: { enable: true, speed: 6, direction: "none", random: true, out_mode: "bounce" }
                    },
                    interactivity: {
                        detect_on: "canvas",
                        events: {
                            onhover: { enable: true, mode: "grab" },
                            onclick: { enable: true, mode: "push" },
                            resize: true
                        }
                    },
                    retina_detect: true
                });
            }
        };
        document.head.appendChild(script);
    }

    // Initialize everything when DOM is ready
    function init() {
        initLazyLoading();
        initHeroVideo();

        // Wait for Swiper to be loaded
        if (typeof Swiper !== 'undefined') {
            initSliders();
        } else {
            document.addEventListener('swiper:loaded', initSliders);
        }

        // Load particles after main content
        if ('requestIdleCallback' in window) {
            requestIdleCallback(loadParticles);
        } else {
            setTimeout(loadParticles, 2000);
        }
    }

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
