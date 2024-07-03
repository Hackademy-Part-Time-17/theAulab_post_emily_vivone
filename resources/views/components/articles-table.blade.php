<table class="table table-striped table-hover border">
    <thead class=" table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Nessuna categoria'}}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if (is_null($article->is_accepetd))
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-info text-white">Leggi l'articolo</a>
                    @else
                    <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                        @csrf
                        <button class="btn btn-info text-white">Riporta in revisione</button>
                    </form>
                        
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>