<x-layout title="Dashboard">
    <x-header testo="Bentornato Amministratore" />
    <x-message />
    <x-errors />
    {{-- tabella per richieste admin --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo Amministratore</h2>
                <x-requests-table 
                :roleRequests="$adminRequests"
                 role="Amministratore"
                />
            </div>
        </div>
    </div>

    {{-- tabella per richieste revisore --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo Revisore</h2>
                <x-requests-table 
                :roleRequests="$revisorRequests"
                 role="Revisore"
                />
            </div>
        </div>
    </div>

    {{-- tabella per richieste redattore --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo Redattore</h2>
                <x-requests-table 
                :roleRequests="$writerRequests"
                 role="Redattore"
                />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metainfo-table 
                :metaInfos="$tags"
                 metaType="tags"
                />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Le categorie della piattaforma</h2>
                <x-metainfo-table 
                :metaInfos="$categories"
                 metaType="categories"
                />
                <form action="{{ route('admin.storeCategory') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                    <button type="submit" class="btn btn-success text-white">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>