<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bioskop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://thumbor.prod.vidiocdn.com/7-ZergdSoVIi2Nc4D-AFJx_LTko=/1280x720/filters:quality(70)/vidio-web-prod-video/uploads/video/image/7201419/sinopsis-film-horor-jailangkung-sandekala-2022-b04a16.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.3); /* Overlay hitam untuk meningkatkan kontras teks */
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .text-dark {
            color: #fff; /* Warna teks putih untuk kontras dengan latar belakang gelap */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7); /* Menambahkan bayangan pada teks */
        }
        .button {
            transition: background-color 0.3s, transform 0.3s;
        }
        .button:hover {
            background-color: #4a90e2; /* Warna biru saat hover */
            transform: scale(1.05); /* Efek zoom saat hover */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="overlay min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-5xl font-bold text-center text-white mb-6 drop-shadow-lg">Pemesanan Tiket Bioskop</h1>
            <p class="text-lg text-center text-white mb-6">Silakan isi data di bawah ini untuk memesan tiket bioskop.</p>

            <!-- Form Tambah Pemesanan -->
            <div class="p-8 mb-8 fade-in">
                <h2 class="text-3xl font-semibold mb-4 text-blue-600 text-dark">Tambah Pemesanan</h2>
                <form action="<?php echo e(route('pemesanan.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-300 mb-2">Nama Pemesan</label>
                            <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
                        </div>
                        <div>
                            <label class="block text-gray-300 mb-2">Film</label>
                            <select name="movie" class="w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
                                <option value="Film A /kuntilanak mulet">Film A /kuntilanak mulet</option>
                                <option value="Film B /tuyul gondrong">Film B /tuyul gondrong</option>
                                <option value="Film C /the king of pocong">Film C /the king of pocong</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-300 mb-2">Status Pemesanan</label>
                            <select name="status" class="w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
                                <option value="Dipesan">Dipesan</option>
                                <option value="Dibatalkan">Dibatalkan</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg button">Simpan</button>
                </form>
            </div>

            <!-- Daftar Pemesanan -->
            <div class="p-6 mb-8 fade-in">
                <h2 class="text-3xl font-semibold text-green-600 text-dark">Data Pemesanan</h2>
                <div class="flex justify-between items-center mb-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari pemesanan..." class="px-4 py-2 border border-gray-300 rounded-lg w-64" id="searchInput">
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-transparent">
                        <thead class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Film</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php $__empty_1 = true; $__currentLoopData = $pemesanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pemesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="transition duration-300 transform hover:bg-gray-100 fade-in">
                                    <td class="px-6 py-4 whitespace-nowrap text-dark"><?php echo e($pemesanan->name); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-dark"><?php echo e($pemesanan->email); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-dark"><?php echo e($pemesanan->movie); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            <?php echo e($pemesanan->status == 'Dipesan' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                            <?php echo e($pemesanan->status); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="<?php echo e(route('pemesanan.edit', $pemesanan->id)); ?>" class="text-blue-500 hover:text-blue-700 mr-3">Edit</a>
                                        <form action="<?php echo e(route('pemesanan.destroy', $pemesanan->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data ditemukan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Statistik Pemesanan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-lg rounded-lg p-6 text-center border-l-8 border-purple-500 fade-in">
                    <h3 class="text-lg font-semibold mb-2">Total Pemesanan</h3>
                    <p class="text-3xl font-bold text-blue-600"><?php echo e($totalPemesanans); ?></p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center border-l-8 border-green-500 fade-in">
                    <h3 class="text-lg font-semibold mb-2">Dipesan</h3>
                    <p class="text-3xl font-bold text-green-600"><?php echo e($totalDipesan); ?></p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 text-center border-l-8 border-red-500 fade-in">
                    <h3 class="text-lg font-semibold mb-2">Dibatalkan</h3>
                    <p class="text-3xl font-bold text-red-600"><?php echo e($totalDibatalkan); ?></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi pencarian sederhana
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\blajar_laravel\blajar_laravel\resources\views/pemesanan.blade.php ENDPATH**/ ?>