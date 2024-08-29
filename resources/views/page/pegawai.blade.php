<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    {{-- INCLUDE/IMPORT COMPONENTS DLL --}}
    @include('components.navbar') <!-- Navbar disertakan di sini -->

    {{-- LAYOUT UTAMA --}}
    <section class="container px-4 mx-auto pt-8 pb-20">
        <div class="flex items-center gap-x-3">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Pegawai Venturo</h2>
            <a href="{{ route('pegawai.index') }}"
                class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $pegawaiCount }}
                pegawai</a>
        </div>

        {{-- TABEL DATA --}}
        <div class="flex flex-col mt-5">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="mb-5 overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                        Id</th>
                                    <th
                                        class="py-3.5 px-4 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                        Nama</th>
                                    <th
                                        class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                        Email</th>
                                    <th
                                        class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                        Avatar</th>
                                    <th
                                        class="px-12 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                        Action</th>
                                </tr>
                            </thead>



                            {{-- ISI TABEL/TABEL BODY --}}
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($data as $item)
                                    <tr id="row-{{ $item['id'] }}">
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            {{ $item['id'] }}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            {{ $item['name'] }}</td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            {{ $item['email'] }}</td>
                                        <td
                                            class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <img src="{{ $item['avatar'] }}" alt="Avatar"
                                                class="w-20 h-20 rounded-full"
                                                onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDNajgNyRBO7V-ow02dgPNtuWi5WvAoS0iGA&s';">
                                        </td>



                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <button onclick="confirmDelete({{ $item['id'] }}) "
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>


                                                <button onclick="toggleForm({{ $loop->index }})"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </button>


                                                <a href="#" onclick="window.location.href='{{ url('/pegawai/create')}}'" method="get"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-blue-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                    </svg>
                                                </a>
                                                
                                            </div>
                                        </td>
                                    </tr>



                                    {{-- FORM EDIT DATA --}}
                                    <tr id="collapse-{{ $loop->index }}" hidden>
                                        <td colspan="7" class="bg-white shadow rounded-lg p-4">
                                            <form>
                                                @csrf
                                                @method('put')
                                                <div class="flex items-center space-x-2">
                                                    <div class="block">
                                                        <label for="nama" class="flex mb-2 text-gray-700">Nama
                                                            Pegawai:</label>
                                                        <input type="text" name="nama"
                                                            value="{{ $item['name'] }}"
                                                            class="w-64 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                            placeholder="Masukkan Nama">
                                                    </div>
                                                    <div class="block">
                                                        <label for="email"
                                                            class="flex mb-2 text-gray-700">Email:</label>
                                                        <input type="text" name="email"
                                                            value="{{ $item['email'] }}"
                                                            class="w-50 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                            placeholder="Masukkan Email">
                                                    </div>
                                                    <div class="block">
                                                        <label for="avatar"
                                                            class="flex mb-2 text-gray-700">Avatar:</label>
                                                        <input type="text" name="avatar"
                                                            value="{{ $item['avatar'] }}"
                                                            class="w-50 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                            placeholder="Masukkan Foto">
                                                    </div>
                                                    <div class="mt-4">
                                                        <button type="button"
                                                            onclick="updatePegawai({{ $item['id'] }}, {{ $loop->index }})"
                                                            class="px-4 py-2 text-white bg-blue-500 rounded-lg">Submit</button>
                                                    </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <script>
        function toggleForm(index) {
            const form = document.getElementById(`collapse-${index}`);
            form.hidden = !form.hidden;
        }

        function confirmDelete(id) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                deletePegawai(id);
            }
        }

        //DELETE PEGAWAI
        function deletePegawai(id) {
            $.ajax({
                url: `/pegawai/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    document.getElementById(`row-${id}`).remove();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }


        //EDIT PEGAWAI
        function updatePegawai(id, index) {
            const formData = {
                name: document.querySelector(`#collapse-${index} [name="nama"]`).value,
                email: document.querySelector(`#collapse-${index} [name="email"]`).value,
                avatar: document.querySelector(`#collapse-${index} [name="avatar"]`).value,
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: `/pegawai/${id}`,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    alert('Data updated successfully!');
                    location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
</body>

</html>
