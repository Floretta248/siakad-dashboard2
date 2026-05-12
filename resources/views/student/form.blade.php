<div
    x-show="openCreate"
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white p-8 rounded-2xl w-full max-w-lg">

        <h2 class="text-2xl font-bold mb-4">
            Tambah Data Mahasiswa
        </h2>

        <form action="{{ route('student.store') }}" method="POST">
            @csrf

            <input type="text"
                name="name"
                placeholder="Name"
                class="w-full border p-3 rounded-lg mb-4">

            <input type="email"
                name="email"
                placeholder="Email"
                class="w-full border p-3 rounded-lg mb-4">

            <select name="prodi" class="w-full border p-3 rounded-lg mb-4">
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Sains Data">Sains Data</option>
                <option value="Bisnis Digital">Bisnis Digital</option>
            </select>

            <input type="number"
                name="angkatan"
                placeholder="Angkatan"
                min="2000"
                class="w-full border p-3 rounded-lg mb-4">

            <div class="flex items-center gap-2 mb-4">
                <input type="hidden" name="is_graduated" value="0">
                <input type="checkbox" name="is_graduated" value="1" id="create-is-graduated" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="create-is-graduated" class="text-gray-700">Lulus</label>
            </div>

            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    @click="openCreate = false"
                    class="bg-gray-300 px-4 py-2 rounded-lg">
                        Batal
                </button>

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Simpan
                </button>

            </div>

        </form>
    </div>

</div>

<!-- EDIT MODAL -->
<div
    x-show="openEdit"
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white w-full max-w-lg rounded-2xl shadow-2xl p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold text-gray-800">
                Ubah Data Mahasiswa
            </h2>

            <button
                @click="openEdit = false"
                class="text-2xl text-gray-500 hover:text-gray-700">
                &times;
            </button>

        </div>

        <!-- Form -->
        <form
            :action="'/student/' + student.id"
            method="POST"
            class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div>

                <label class="block text-gray-700 font-medium mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    x-model="student.name"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3">

            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    x-model="student.email"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Prodi
                </label>

                <select
                    name="prodi"
                    x-model="student.prodi"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3">
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Sains Data">Sains Data</option>
                    <option value="Bisnis Digital">Bisnis Digital</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Angkatan
                </label>

                <input
                    type="number"
                    name="angkatan"
                    x-model="student.angkatan"
                    min="2000"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3">
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="is_graduated" value="0">
                <input
                    type="checkbox"
                    name="is_graduated"
                    x-model="student.is_graduated"
                    :true-value="1"
                    :false-value="0"
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label class="text-gray-700">Lulus</label>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-4">

                <button
                    type="button"
                    @click="openEdit = false"
                    class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded-lg">
                        Batal
                </button>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>