<x-layout title="Dashboard">
    <x-header testo="Bentornato Redattore: {{ Auth::user()->name }}" />
    <x-message />
    {{-- tabella per richieste admin --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli in fase di revisione</h2>
                <x-writer-articles-table 
                :articles="$unRevisionedArticles"
                />
            </div>
        </div>
    </div>

    {{-- tabella per richieste revisore --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli pubblicati</h2>
                <x-writer-articles-table 
                :articles="$acceptedArticles"
                 />
            </div>
        </div>
    </div>

    {{-- tabella per richieste redattore --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli respinti</h2>
                <x-writer-articles-table 
                :articles="$rejectedArticles"
                />
            </div>
        </div>
    </div>

</x-layout>