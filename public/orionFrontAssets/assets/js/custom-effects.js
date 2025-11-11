(function () {
    const CARD_SELECTORS = [
        '.card',
        '.hot-products__single',
        '.feature-one__single',
        '.news-one__single',
        '.news-sidebar__single',
        '.why-choose-one__single',
        '.team-one__single',
        '.categories-one__single',
        '.gallery-three__single',
        '.gallery-one__single',
        '.gallery-two__single',
        '.product-list__single',
        '.sidebar__single',
        '.clients-style1__single',
        '.clients-one__single',
        '.service-one__single',
        '.service-two__single',
        '.achieve-one__single',
        '.project-one__single',
        '.project-two__single',
        '.sector-one__single',
        '.event-one__single',
        '.event-two__single',
        '.testimonial-one__single',
        '.categories-two__single',
        '.footer-widget__gallery-img'
    ];

    const BUTTON_SELECTORS = [
        'a.thm-btn',
        '.thm-btn',
        'button',
        'input[type="submit"]',
        'input[type="button"]',
        'input[type="reset"]'
    ];

    const CARD_CLASS = 'global-hover-card';
    const BUTTON_CLASS = 'global-hover-btn';
    const PROCESSED_FLAG = 'data-hover-processed';
    const CARD_PROCESSED_FLAG = 'data-card-hover-processed';

    const isButtonElement = (el) => {
        if (!el) {
            return false;
        }
        const tag = el.tagName;
        if (tag === 'BUTTON' || el.classList.contains('thm-btn')) {
            return true;
        }

        if (tag === 'INPUT') {
            const type = (el.getAttribute('type') || '').toLowerCase();
            return ['submit', 'button', 'reset'].includes(type);
        }

        if (tag === 'A') {
            return el.classList.contains('thm-btn') || el.getAttribute('role') === 'button';
        }

        return false;
    };

    const applyCardEffects = (root = document) => {
        const cards = root.querySelectorAll(CARD_SELECTORS.join(','));
        cards.forEach((card) => {
            if (!card || card.getAttribute(CARD_PROCESSED_FLAG)) {
                return;
            }

            if (!card.classList.contains(CARD_CLASS)) {
                card.classList.add(CARD_CLASS);
            }
            card.setAttribute(CARD_PROCESSED_FLAG, '1');
        });
    };

    const applyButtonEffects = (root = document) => {
        const buttons = root.querySelectorAll(BUTTON_SELECTORS.join(','));
        buttons.forEach((btn) => {
            if (!btn || btn.getAttribute(PROCESSED_FLAG)) {
                return;
            }

            if (!isButtonElement(btn)) {
                return;
            }

            if (!btn.classList.contains(BUTTON_CLASS)) {
                btn.classList.add(BUTTON_CLASS);
            }
            btn.setAttribute(PROCESSED_FLAG, '1');
        });
    };

    const applyHoverEnhancements = (root = document) => {
        applyCardEffects(root);
        applyButtonEffects(root);
    };

    const equalizeCardHeights = () => {
        const cards = document.querySelectorAll(CARD_SELECTORS.join(','));
        if (!cards.length) {
            return;
        }

        const parentMap = new Map();
        cards.forEach((card) => {
            if (!(card instanceof HTMLElement)) {
                return;
            }
            card.style.minHeight = '';
            if (card.closest('.swiper-slide')) {
                return;
            }
            const parent = card.parentElement;
            if (!parent) {
                return;
            }
            if (!parentMap.has(parent)) {
                parentMap.set(parent, []);
            }
            parentMap.get(parent).push(card);
        });

        parentMap.forEach((group) => {
            let maxHeight = 0;
            group.forEach((card) => {
                const rect = card.getBoundingClientRect();
                const height = rect.height;
                if (height > maxHeight) {
                    maxHeight = height;
                }
            });
            if (!maxHeight) {
                return;
            }
            group.forEach((card) => {
                card.style.minHeight = `${maxHeight}px`;
            });
        });
    };

    let equalizeTimer = null;
    const scheduleEqualize = () => {
        if (equalizeTimer) {
            cancelAnimationFrame(equalizeTimer);
        }
        equalizeTimer = requestAnimationFrame(() => {
            equalizeTimer = null;
            equalizeCardHeights();
        });
    };

    const init = () => {
        applyHoverEnhancements(document);
        scheduleEqualize();

        // Observe for dynamically injected content
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'childList' && mutation.addedNodes.length) {
                    mutation.addedNodes.forEach((node) => {
                        if (node.nodeType !== 1) {
                            return;
                        }
                        applyHoverEnhancements(node);
                        scheduleEqualize();
                    });
                }
            });
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

        window.addEventListener('resize', scheduleEqualize);
        window.addEventListener('load', scheduleEqualize, { once: true });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init, { once: true });
    } else {
        init();
    }
})();

