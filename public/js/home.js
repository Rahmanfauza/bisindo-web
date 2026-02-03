// Home Page JavaScript Functions

// About Slider Functionality
document.addEventListener('DOMContentLoaded', function () {
    let currentSlide = 0;
    const totalSlides = 3;
    const slider = document.getElementById('aboutSlider');
    const dots = document.querySelectorAll('.slider-dot');

    // Define functions and attach to window for HTML access
    window.updateSlider = function () {
        if (!slider) return;
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;

        // Update dots
        if (dots) {
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.remove('bg-white/50');
                    dot.classList.add('bg-white', 'w-6');
                } else {
                    dot.classList.add('bg-white/50');
                    dot.classList.remove('bg-white', 'w-6');
                }
            });
        }
    }

    window.moveSlider = function (direction) {
        currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
        window.updateSlider();
    }

    window.goToSlide = function (index) {
        currentSlide = index;
        window.updateSlider();
    }

    // Initialize
    if (slider) {
        window.updateSlider();

        // Auto slide every 5 seconds
        setInterval(() => {
            window.moveSlider(1);
        }, 5000);
    }
});

// FAQ Toggle Functionality
function toggleFAQ(button) {
    const faqItem = button.closest('.faq-item');
    const answer = faqItem.querySelector('.faq-answer');
    const icon = button.querySelector('i');
    const allFaqItems = document.querySelectorAll('.faq-item');

    // Close all other FAQ items
    allFaqItems.forEach(item => {
        if (item !== faqItem) {
            const otherAnswer = item.querySelector('.faq-answer');
            const otherIcon = item.querySelector('.faq-question i');
            otherAnswer.style.maxHeight = '0px';
            otherIcon.classList.remove('fa-minus', 'rotate-180');
            otherIcon.classList.add('fa-plus');
        }
    });

    // Toggle current FAQ item
    if (answer.style.maxHeight && answer.style.maxHeight !== '0px') {
        answer.style.maxHeight = '0px';
        icon.classList.remove('fa-minus', 'rotate-180');
        icon.classList.add('fa-plus');
    } else {
        answer.style.maxHeight = answer.scrollHeight + 'px';
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus', 'rotate-180');
    }
}

// Login/Register Modal Functions
document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUpBtn');
    const signInButton = document.getElementById('signInBtn');
    const mobileSignUpButton = document.getElementById('mobileSignUpBtn');
    const mobileSignInButton = document.getElementById('mobileSignInBtn');
    const container = document.getElementById('sliderContainer');

    // Function to update mobile tab states
    function updateMobileTabs(isSignUp) {
        if (mobileSignInButton && mobileSignUpButton) {
            if (isSignUp) {
                // Sign Up active
                mobileSignUpButton.classList.remove('text-gray-400', 'border-transparent');
                mobileSignUpButton.classList.add('text-primary-green', 'border-primary-green');
                mobileSignInButton.classList.add('text-gray-400', 'border-transparent');
                mobileSignInButton.classList.remove('text-primary-green', 'border-primary-green');
            } else {
                // Sign In active
                mobileSignInButton.classList.remove('text-gray-400', 'border-transparent');
                mobileSignInButton.classList.add('text-primary-green', 'border-primary-green');
                mobileSignUpButton.classList.add('text-gray-400', 'border-transparent');
                mobileSignUpButton.classList.remove('text-primary-green', 'border-primary-green');
            }
        }
    }

    // Desktop overlay buttons
    if (signUpButton && signInButton && container) {
        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
            updateMobileTabs(true);
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
            updateMobileTabs(false);
        });
    }

    // Mobile toggle buttons
    if (mobileSignUpButton && mobileSignInButton && container) {
        mobileSignUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
            updateMobileTabs(true);
        });

        mobileSignInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
            updateMobileTabs(false);
        });
    }

    // Global helper functions for inline form links
    window.switchToSignUp = function () {
        if (container) {
            container.classList.add("right-panel-active");
            updateMobileTabs(true);
        }
    };

    window.switchToSignIn = function () {
        if (container) {
            container.classList.remove("right-panel-active");
            updateMobileTabs(false);
        }
    };

    // Expose openRegister to global scope
    window.openRegister = function () {
        const modal = document.getElementById('loginModal');
        const container = document.getElementById('sliderContainer');
        if (modal && container) {
            modal.classList.remove('hidden');
            // Small delay to ensure modal is visible before sliding
            setTimeout(() => {
                container.classList.add("right-panel-active");
                updateMobileTabs(true);
            }, 100);
        }
    };

    // Form Validation
    const registerForm = document.getElementById('modalRegisterForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            const password = this.querySelector('input[name="password"]').value;
            const confirmPassword = this.querySelector('input[name="password_confirmation"]').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan Konfirmasi Password tidak cocok!');
            }
        });
    }
});
