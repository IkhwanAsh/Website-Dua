<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bioskop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <header class="mb-12 text-center">
            <h1 class="text-4xl font-bold text-indigo-700 mb-2">Pemesanan Tiket Bioskop</h1>
            <p class="text-lg text-gray-600">Silakan isi data di bawah ini untuk memesan tiket bioskop.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="bg-white rounded-xl shadow-md p-6 lg:col-span-1 h-fit">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">
                    <span id="formTitle">Tambah</span> Pemesanan
                </h2>
                
                <form id="dataForm" class="space-y-4">
                    <input type="hidden" id="recordId">
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pemesan</label>
                        <input type="text" id="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div>
                        <label for="movie" class="block text-sm font-medium text-gray-700 mb-1">Film</label>
                        <select id="movie"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="Film A">Film A /kuntilanak mulet</option>
                            <option value="Film B">Film B /tuyul gondrong</option>
                            <option value="Film C">Film C /cinta bertepuk sebelah kaki</option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Pemesanan</label>
                        <select id="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="Dipesan">Dipesan</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <button type="submit" id="submitBtn"
                            class="bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
                            Simpan
                        </button>
                        <button type="button" id="cancelBtn"
                            class="bg-gray-200 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors hidden">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Data Display Section -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Data Pemesanan</h2>
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari pemesanan..." 
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <div id="dataTable">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Film</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="recordsBody" class="bg-white divide-y divide-gray-200">
                                    <!-- Records will be inserted here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Statistik Pemesanan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-indigo-50 rounded-lg p-4">
                            <div class="text-indigo-800 font-medium">Total Pemesanan</div>
                            <div id="totalRecords" class="text-3xl font-bold text-indigo-600">0</div>
                        </div>
                        <div class="bg-green-50 rounded-lg p-4">
                            <div class="text-green-800 font-medium">Dipesan</div>
                            <div id="activeRecords" class="text-3xl font-bold text-green-600">0</div>
                        </div>
                        <div class="bg-amber-50 rounded-lg p-4">
                            <div class="text-amber-800 font-medium">Dibatalkan</div>
                            <div id="inactiveRecords" class="text-3xl font-bold text-amber-600">0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Database class to handle localStorage operations
        class LocalDatabase {
            constructor(dbName) {
                this.dbName = dbName;
                this.initializeDB();
            }
            
            initializeDB() {
                if (!localStorage.getItem(this.dbName)) {
                    localStorage.setItem(this.dbName, JSON.stringify([]));
                }
            }
            
            getAllRecords() {
                return JSON.parse(localStorage.getItem(this.dbName));
            }
            
            getRecordById(id) {
                const records = this.getAllRecords();
                return records.find(record => record.id === id);
            }
            
            addRecord(record) {
                const records = this.getAllRecords();
                record.id = Date.now().toString();
                records.push(record);
                localStorage.setItem(this.dbName, JSON.stringify(records));
                return record;
            }
            
            updateRecord(updatedRecord) {
                const records = this.getAllRecords();
                const index = records.findIndex(r => r.id === updatedRecord.id);
                if (index !== -1) {
                    records[index] = updatedRecord;
                    localStorage.setItem(this.dbName, JSON.stringify(records));
                    return true;
                }
                return false;
            }
            
            deleteRecord(id) {
                const records = this.getAllRecords();
                const filteredRecords = records.filter(record => record.id !== id);
                localStorage.setItem(this.dbName, JSON.stringify(filteredRecords));
                return true;
            }
            
            searchRecords(query) {
                const records = this.getAllRecords();
                query = query.toLowerCase();
                return records.filter(record => 
                    record.name.toLowerCase().includes(query) || 
                    record.email.toLowerCase().includes(query) ||
                    record.movie.toLowerCase().includes(query) ||
                    record.status.toLowerCase().includes(query)
                );
            }
            
            getStats() {
                const records = this.getAllRecords();
                const total = records.length;
                const booked = records.filter(r => r.status === 'Dipesan').length;
                const canceled = total - booked;
                
                return { total, booked, canceled };
            }
        }

        // UI Controller class
        class UIController {
            constructor(database) {
                this.database = database;
                this.initializeElements();
                this.setupEventListeners();
                this.renderAllRecords(); // Memanggil renderAllRecords saat UIController diinisialisasi
                this.updateStats();
                this.currentEditId = null;
            }
            
            initializeElements() {
                this.form = document.getElementById('dataForm');
                this.nameInput = document.getElementById('name');
                this.emailInput = document.getElementById('email');
                this.movieInput = document.getElementById('movie');
                this.statusInput = document.getElementById('status');
                this.recordIdInput = document.getElementById('recordId');
                this.submitBtn = document.getElementById('submitBtn');
                this.cancelBtn = document.getElementById('cancelBtn');
                this.formTitle = document.getElementById('formTitle');
                this.recordsBody = document.getElementById('recordsBody');
                this.searchInput = document.getElementById('searchInput');
                this.totalRecordsEl = document.getElementById('totalRecords');
                this.activeRecordsEl = document.getElementById('activeRecords');
                this.inactiveRecordsEl = document.getElementById('inactiveRecords');
            }
            
            setupEventListeners() {
                this.form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.handleFormSubmit();
                });
                
                this.cancelBtn.addEventListener('click', () => {
                    this.resetForm();
                });
                
                this.searchInput.addEventListener('input', (e) => {
                    this.renderRecords(this.database.searchRecords(e.target.value));
                });
            }
            
            handleFormSubmit() {
                const record = {
                    name: this.nameInput.value,
                    email: this.emailInput.value,
                    movie: this.movieInput.value,
                    status: this.statusInput.value
                };
                
                if (this.currentEditId) {
                    record.id = this.currentEditId;
                    this.database.updateRecord(record);
                } else {
                    this.database.addRecord(record);
                }
                
                this.resetForm();
                this.renderAllRecords();
                this.updateStats();
            }
            
            renderAllRecords() {
                this.renderRecords(this.database.getAllRecords());
            }
            
            renderRecords(records) {
                this.recordsBody.innerHTML = '';
                
                if (records.length === 0) {
                    this.recordsBody.innerHTML = `
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data ditemukan
                            </td>
                        </tr>
                    `;
                    return;
                }
                
                records.forEach(record => {
                    const row = document.createElement('tr');
                    row.classList.add('animate-fade-in');
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">${record.name}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">${record.email}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">${record.movie}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                ${record.status === 'Dipesan' ? 'bg-green-100 text-green-800' : 
                                  'bg-red-100 text-red-800'}">
                                ${record.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button data-id="${record.id}" class="text-indigo-600 hover:text-indigo-900 mr-3 edit-btn">
                                Edit
                            </button>
                            <button data-id="${record.id}" class="text-red-600 hover:text-red-900 delete-btn">
                                Hapus
                            </button>
                        </td>
                    `;
                    
                    this.recordsBody.appendChild(row);
                });
                
                // Add event listeners to buttons
                document.querySelectorAll('.edit-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => this.editRecord(e.target.dataset.id));
                });
                
                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => this.deleteRecord(e.target.dataset.id));
                });
            }
            
            editRecord(id) {
                const record = this.database.getRecordById(id);
                if (record) {
                    this.currentEditId = id;
                    this.recordIdInput.value = id;
                    this.nameInput.value = record.name;
                    this.emailInput.value = record.email;
                    this.movieInput.value = record.movie;
                    this.statusInput.value = record.status;
                    
                    this.formTitle.textContent = 'Edit';
                    this.submitBtn.textContent = 'Perbarui';
                    this.cancelBtn.classList.remove('hidden');
                }
            }
            
            deleteRecord(id) {
                if (confirm('Apakah Anda yakin ingin menghapus pemesanan ini?')) {
                    this.database.deleteRecord(id);
                    this.renderAllRecords();
                    this.updateStats();
                    
                    // If we're editing the deleted record, reset the form
                    if (this.currentEditId === id) {
                        this.resetForm();
                    }
                }
            }
            
            resetForm() {
                this.form.reset();
                this.currentEditId = null;
                this.recordIdInput.value = '';
                this.formTitle.textContent = 'Tambah';
                this.submitBtn.textContent = 'Simpan';
                this.cancelBtn.classList.add('hidden');
            }
            
            updateStats() {
                const { total, booked, canceled } = this.database.getStats();
                this.totalRecordsEl.textContent = total;
                this.activeRecordsEl.textContent = booked;
                this.inactiveRecordsEl.textContent = canceled;
            }
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            const database = new LocalDatabase('ticketBookingDatabase');
            const uiController = new UIController(database);
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\blajar_laravel\resources\views/pendaftaran.blade.php ENDPATH**/ ?>