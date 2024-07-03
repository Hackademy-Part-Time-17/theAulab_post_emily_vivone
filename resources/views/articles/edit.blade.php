<x-layout title="Modifica Articolo">

    <x-header testo="Modifica Articolo" />
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <x-errors />
                <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data"
                class="card p-5 shadow">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" name="title" class=" form-control" id="title" 
                    value="{{ $article->title }}">
                </div>
                
                <div class=" mb-3">
                    <label for="subtitle" class="form-label">Sottotitolo:</label>
                    <input type="text" name="subtitle" class=" form-control" id="subtitle" 
                    value="{{ $article->subtitle }}">
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine:</label>
                    <input type="file" name="image" class=" form-control" id="image">
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags:</label>
                    <input name="tags" class=" form-control" id="tags" value="{{ $article->tags->implode('name', ',') }}">
                    <span class=" small fst-italic">Dividi i tags con una virgola</span>
                </div>
                
                <div class="mb-3">
                    <label for="category" class="form-label">Categorie:</label>
                    <select name="category" id="category" class=" form-control text-capitalize">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                             @if($article->category && $category->id == $article->category->id) selected @endif>
                             {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="body" class="form-label">Corpo del testo:</label>
                    <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{ $article->body }}</textarea>
                </div>
                
                <div class="mt-2 d-flex justify-content-center">
                    <button class="btn btn-info text-white">Modifica l'articolo</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

</x-layout>