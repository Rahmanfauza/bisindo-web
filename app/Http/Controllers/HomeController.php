<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $isLoggedIn = Auth::check();
        
        $navItems = ['Home', 'Services', 'About', 'Contact'];
        
        $features = [
            [
                'icon' => 'fa-book-open', 
                'title' => 'Pembelajaran Interaktif', 
                'description' => 'Pelajari gerakan bahasa isyarat Indonesia dengan video, animasi, dan latihan interaktif.',
                'tag' => 'Learning',
                'tag_icon' => 'fa-book',
                'bg_class' => 'bg-cyan-50',
                'text_class' => 'text-cyan-900',
                'icon_bg' => 'bg-cyan-100',
                'icon_color' => 'text-cyan-600'
            ],
            [
                'icon' => 'fa-robot', 
                'title' => 'Penerjemah AI', 
                'description' => 'Gunakan teknologi AI canggih untuk menerjemahkan gerakan tangan secara real-time.',
                'tag' => 'Technology',
                'tag_icon' => 'fa-microchip',
                'bg_class' => 'bg-green-50',
                'text_class' => 'text-green-900',
                'icon_bg' => 'bg-green-100',
                'icon_color' => 'text-green-600'
            ],
            [
                'icon' => 'fa-users', 
                'title' => 'Komunitas Inklusif', 
                'description' => 'Bergabunglah dengan komunitas yang mendukung dan inklusif untuk semua kalangan.',
                'tag' => 'Community',
                'tag_icon' => 'fa-users',
                'bg_class' => 'bg-pink-50',
                'text_class' => 'text-pink-900',
                'icon_bg' => 'bg-pink-100',
                'icon_color' => 'text-pink-600'
            ]
        ];

        // Who is IsyaraLearn For - Audience Cards
        $audienceCards = [
            [
                'title' => 'Orang Tua dengan Anak',
                'description' => 'Jadikan belajar BISINDO sebagai pengalaman bonding yang menyenangkan dengan anak-anak melalui pelajaran interaktif.',
                'icon' => 'fa-users',
                'gradient' => 'from-orange-50 to-orange-100',
                'icon_color' => 'text-orange-500'
            ],
            [
                'title' => 'Guru dan Pendidik',
                'description' => 'Integrasikan BISINDO ke dalam toolkit pengajaran Anda untuk mendukung kelas inklusif dan komunikasi yang lebih baik.',
                'icon' => 'fa-chalkboard-teacher',
                'gradient' => 'from-cyan-50 to-cyan-100',
                'icon_color' => 'text-cyan-500'
            ],
            [
                'title' => 'Pemula yang Baru Memulai',
                'description' => 'Tidak perlu pengalaman sebelumnya, mulai dari dasar dan bangun keterampilan Anda langkah demi langkah sesuai kecepatan Anda sendiri.',
                'icon' => 'fa-user-plus',
                'gradient' => 'from-green-50 to-green-100',
                'icon_color' => 'text-green-500'
            ],
            [
                'title' => 'Pembelajar Seumur Hidup',
                'description' => 'Segarkan dan perkuat pengetahuan BISINDO Anda dengan konten menarik yang dirancang untuk pertumbuhan berkelanjutan.',
                'icon' => 'fa-book-reader',
                'gradient' => 'from-pink-50 to-pink-100',
                'icon_color' => 'text-pink-500'
            ],
            [
                'title' => 'Siapa Saja yang Ingin Belajar',
                'description' => 'Pelajari isyarat praktis yang membantu Anda berkomunikasi secara alami dalam situasi sehari-hari.',
                'icon' => 'fa-globe',
                'gradient' => 'from-purple-50 to-purple-100',
                'icon_color' => 'text-purple-500'
            ]
        ];

        // FAQ Data
        $faqs = [
            [
                'question' => 'Apakah IsyaraLearn gratis untuk digunakan?',
                'answer' => 'Ya! IsyaraLearn menawarkan akses gratis ke ratusan pelajaran BISINDO dasar. Anda dapat mulai belajar abjad, angka, dan kata-kata umum tanpa biaya. Kami juga menawarkan fitur premium untuk konten lanjutan dan latihan interaktif dengan AI.'
            ],
            [
                'question' => 'Apakah saya perlu pengalaman BISINDO sebelumnya?',
                'answer' => 'Tidak sama sekali! IsyaraLearn dirancang untuk pemula yang belum pernah belajar bahasa isyarat sebelumnya. Kami memulai dari dasar-dasar seperti abjad dan angka, kemudian secara bertahap membangun keterampilan Anda dengan pelajaran yang terstruktur.'
            ],
            [
                'question' => 'Apakah aplikasi ini cocok untuk anak-anak?',
                'answer' => 'Tentu saja! IsyaraLearn sangat cocok untuk anak-anak. Pelajaran kami dirancang dengan antarmuka yang ramah dan menyenangkan, menggunakan video demonstrasi yang jelas, dan permainan interaktif yang membuat belajar menjadi pengalaman yang menyenangkan untuk segala usia.'
            ],
            [
                'question' => 'Apa yang saya dapatkan dengan IsyaraLearn Premium?',
                'answer' => 'Dengan Premium, Anda mendapatkan akses ke semua level pembelajaran (Pemula, Menengah, Mahir), latihan dengan deteksi gerakan AI real-time, kamus video lengkap dengan lebih dari 2.000 tanda, sertifikat penyelesaian, dan konten eksklusif yang terus diperbarui.'
            ],
            [
                'question' => 'Berapa lama waktu yang dibutuhkan untuk belajar BISINDO?',
                'answer' => 'Kecepatan belajar setiap orang berbeda-beda. Dengan latihan rutin 15-30 menit per hari, Anda dapat menguasai dasar-dasar dalam beberapa minggu. Yang terpenting adalah konsistensi dan berlatih secara teratur sesuai dengan kecepatan Anda sendiri.'
            ],
            [
                'question' => 'Apakah saya bisa menggunakan IsyaraLearn di perangkat mobile?',
                'answer' => 'Ya! IsyaraLearn dapat diakses melalui browser di smartphone, tablet, dan komputer. Platform kami responsif dan dirancang untuk memberikan pengalaman belajar yang optimal di semua perangkat, sehingga Anda dapat belajar kapan saja dan di mana saja.'
            ]
        ];

        return view('home', compact('isLoggedIn', 'navItems', 'features', 'audienceCards', 'faqs'));
    }
}