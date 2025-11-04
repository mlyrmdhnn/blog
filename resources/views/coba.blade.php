<x-layout :title=$title>

    <h1 class="text-gray-600 text-2xl font-light">halo, ini adalah halaman untuk mencoba atau testing, supaya dapat logic laravel nya</h1>
    <h2 class="mt-4">ini data dari app/http/models/coba(masih make dummy, nanti bisa dari db)</h2>

    <br>
    @foreach ($data as $d)
        <div>
            <h3>Nama = {{ $d['nama'] }}</h3>
            <h3>Jurusan = {{ $d['jurusan'] }}</h3>
            <a class="text-blue-500 hover:underline" href="/coba/{{ $d['slug'] }}"><h3>Lihat Data Lengkap</h3></a>
            <br>
        </div>
    @endforeach
</x-layout>