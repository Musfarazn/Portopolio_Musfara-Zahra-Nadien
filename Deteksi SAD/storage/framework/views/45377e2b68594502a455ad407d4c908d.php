<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <p class="mb-6 text-xl font-semibold">Welcome to Sistem Deteksi Social Anxiety Disorder!</p>

    <!-- Bagian Penjelasan Utama -->
    <div class="grid grid-cols-1 gap-6 mb-8">
        <div class="bg-gray-200 rounded-lg p-6 flex flex-col md:flex-row items-start gap-4 shadow-md hover:shadow-lg transition-shadow duration-300">
            <!-- Gambar -->
            <img src="/img/gambar.jpg" alt="Gangguan Kecemasan Sosial" class="w-full md:w-1/3 rounded-lg object-cover">
            
            <!-- Teks dengan justify -->
            <div class="flex-1">
                <h2 class="font-bold text-2xl mb-3">Apa itu gangguan kecemasan sosial?</h2>
                <p class="text-justify text-gray-700">
                    Gangguan kecemasan sosial adalah jenis gangguan kecemasan yang umum. Seseorang 
                    dengan gangguan kecemasan sosial merasakan gejala cemas atau takut dalam situasi 
                    di mana mereka mungkin dinilai, dievaluasi, atau diawasi oleh orang lain, seperti 
                    berbicara di depan umum, bertemu orang baru, berkencan, wawancara kerja, 
                    menjawab pertanyaan di kelas, meminta bantuan, atau berbicara dengan kasir di toko. 
                    Aktivitas sehari-hari seperti makan atau minum di depan orang lain juga bisa menimbulkan rasa takut.
                </p>
            </div>
        </div>
    </div>

    <!-- Bagian Artikel -->
    <h2 class="text-2xl font-bold mb-4">Artikel Terkait</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Artikel 1 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            <img src="/img/gejala.jpg" alt="Artikel 1" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">Gangguan Kecemasan Sosial</h3>
                <p class="text-gray-600 mb-2 text-sm line-clamp-3">
                    Mengenali gejala kecemasan sosial sejak dini dapat membantu mendapatkan penanganan 
                    yang tepat dan mencegah dampak negatif pada kehidupan sehari-hari.
                </p>
                <a href="https://www.halodoc.com/kesehatan/gangguan-kecemasan-sosial?srsltid=AfmBOoofsK3RUVwNCoDez3ur_yU8vpgYRO4wzNHMCLMrCrKbooW1V9QX" target="_blank" class="text-blue-600 hover:underline font-semibold text-sm">
                    Baca Selengkapnya
                </a>
            </div>
        </div>

        <!-- Artikel 2 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            <img src="/img/cemas.png" alt="Artikel 1" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">Fobia Sosial</h3>
                <p class="text-gray-600 mb-2 text-sm line-clamp-3">
                    Rasa takut atau cemas sebenarnya dapat dialami oleh siapa saja ketika berinteraksi dengan orang lain. 
                    Namun, pada penderita fobia sosial, rasa takut ini dialami secara berlebihan dan menetap. Akibatnya, 
                    kondisi ini memengaruhi hubungan dengan orang lain, produktivitas dalam bekerja, dan prestasi di sekolah.
                </p>
                <a href="https://www.alodokter.com/gangguan-kecemasan-sosial" target="_blank" class="text-blue-600 hover:underline font-semibold text-sm">
                    Baca Selengkapnya
                </a>
            </div>
        </div>

        <!-- Artikel 3 -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            <img src="/img/terapy.png" alt="Artikel 1" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2">Terapi Gangguan Kecemasan Sosial</h3>
                <p class="text-gray-600 mb-2 text-sm line-clamp-3">
                    Penanganan gangguan kecemasan sosial umumnya meliputi psikoterapi, pemberian obat-obatan, atau 
                    kombinasi keduanya. Seorang terapis profesional dapat membantu mengenali pemicu stres dan kecemasan, 
                    serta membimbing individu untuk menurunkan sensitivitas terhadap pemicu tersebut sehingga dapat mengelola 
                    kecemasan secara lebih baik dalam kehidupan sehari-hari.
                </p>

                </p>
                <a href="https://www.therapytribe.com/therapy/social-anxiety-therapy/" target="_blank" class="text-blue-600 hover:underline font-semibold text-sm">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\deteksi\resources\views/user/dashboard.blade.php ENDPATH**/ ?>