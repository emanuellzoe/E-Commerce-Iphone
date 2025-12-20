/**
 * Global Smooth Scroll & Click Animation Script
 * Applied to both User and Admin interfaces.
 */

document.addEventListener("DOMContentLoaded", function () {
    // 1. Enable Native Smooth Scrolling globally
    document.documentElement.style.scrollBehavior = "smooth";

    // 2. Intercept Anchor Clicks for Custom Smooth Scroll (Polyfill-like for older browsers/strict control)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // 3. Click Ripple Effect (Visual Feedback)
    document.addEventListener('click', function (e) {
        // Apply effect only to buttons and links
        const target = e.target.closest('a, button, .btn');
        if (target) {
            createRipple(e, target);
        }
    });

    function createRipple(event, element) {
        const circle = document.createElement("span");
        const diameter = Math.max(element.clientWidth, element.clientHeight);
        const radius = diameter / 2;

        const rect = element.getBoundingClientRect();
        
        circle.style.width = circle.style.height = `${diameter}px`;
        circle.style.left = `${event.clientX - rect.left - radius}px`;
        circle.style.top = `${event.clientY - rect.top - radius}px`;
        circle.classList.add("ripple");

        // Remove existing ripples to avoid clutter
        const existingRipple = element.getElementsByClassName("ripple")[0];
        if (existingRipple) {
            existingRipple.remove();
        }

        element.appendChild(circle);
    }
});

// Inject Ripple CSS dynamically
const style = document.createElement('style');
style.innerHTML = `
    /* Ripple Effect CSS */
    a, button, .btn {
        position: relative;
        overflow: hidden; /* Contains the ripple */
    }
    
    span.ripple {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        background-color: rgba(255, 255, 255, 0.3);
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
