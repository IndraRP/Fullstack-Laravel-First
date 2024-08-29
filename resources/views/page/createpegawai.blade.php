<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    {{-- INCLUDE/IMPORT COMPONENTS DLL --}}
    @include('components.navbar')

    {{-- LAYOUT DLL --}}


    {{-- INPUT DATA --}}
    <div class="flex justify-center pt-20">
        <div class="w-full max-w-2xl">
            <div class="mb-3 bg-white rounded-lg shadow">
                <div class="p-4">
                    {{-- ALLERT SUCCESS --}}
                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- ALLERT ERROR --}}
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="create-form" action="{{ route('pegawai.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col mb-3">
                            <!-- Nama -->
                            <label for="name" class="mb-2 text-gray-700">Name:</label>
                            <input type="text" id="name" name="name"
                                class="form-control w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                                placeholder="Masukkan nama" required>

                            <!-- Email -->
                            <label for="email" class="mb-2 text-gray-700">Email:</label>
                            <input type="text" id="email" name="email"
                                class="form-control w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                                placeholder="Masukkan Email" required>

                            <!-- Avatar -->
                            <label for="avatar" class="mt-4 mb-2 text-gray-700">Avatar:</label>
                            <input type="text" id="avatar" name="avatar"
                                class="form-control w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-200"
                                placeholder="Masukkan avatar" required>

                            <!-- Submit Button -->
                            <button
                                class="mt-4 px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300"
                                type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#create-form').submit(function(event) {
                var formData = {
                    name: $('#name').val(),
                    email: $('#email').val(), // Perbaiki nama field di sini
                    avatar: $('#avatar').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: "{{ route('pegawai.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        alert('Data berhasil disimpan!');
                        // Redirect atau tindakan lain
                    },
                    error: function(response) {
                        alert('Terjadi kesalahan. Data gagal disimpan.');
                    }
                });
            });
        });
    </script>
</body>

</html>
