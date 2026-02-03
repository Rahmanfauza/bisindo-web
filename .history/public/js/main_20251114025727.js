// Mobile menu toggle
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    const icon = mobileMenuButton.querySelector('i');

    // GUNAKAN .active BUKAN .hidden
    menu.classList.toggle('active');
    
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-times');
}

mobileMenuButton.addEventListener('click', toggleMobileMenu);

// Tutup menu ketika link diklik
mobileMenuLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.remove('active'); // GUNAKAN remove active
        const icon = mobileMenuButton.querySelector('i');
        icon.classList.add('fa-bars');
        icon.classList.remove('fa-times');
    });
});

// Scroll effect for navigation
window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// About Us scroll animation
const aboutObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    },
    { threshold: 0.3 }
);

document.querySelectorAll('.about-text, .about-photo')
    .forEach((el) => aboutObserver.observe(el));

// Contact form submission
document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const formMsg = document.getElementById('formMsg');

    submitBtn.disabled = true;
    btnText.textContent = 'Mengirim...';

    try {
        const formData = new FormData(this);
        const response = await fetch('{{ route("contact.send") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            formMsg.textContent = result.message;
            formMsg.className = 'text-center text-sm text-green-600';
            this.reset();
        } else {
            throw new Error(result.message || 'Terjadi kesalahan');
        }
    } catch (error) {
        formMsg.textContent = error.message;
        formMsg.className = 'text-center text-sm text-red-600';
    } finally {
        formMsg.classList.remove('hidden');
        submitBtn.disabled = false;
        btnText.textContent = 'Kirim Pesan';

        setTimeout(() => {
            formMsg.classList.add('hidden');
        }, 5000);
    }
});

// Login modal functions
function openLogin() {
    const mobileMenu = document.getElementById('mobile-menu');
    const modal = document.getElementById('loginModal');

    // Tutup mobile menu jika terbuka dan reset icon
    mobileMenu.classList.remove('active');
    const icon = mobileMenuButton.querySelector('i');
    icon.classList.add('fa-bars');
    icon.classList.remove('fa-times');

    // Buka modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeLogin() {
    const modal = document.getElementById('loginModal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

// Tutup modal ketika klik backdrop
document.getElementById('loginModal').addEventListener('click', function(e) {
    if (e.target === this) closeLogin();
});

// Close on ESC key
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeLogin();
});

