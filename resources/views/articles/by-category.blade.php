<x-layout title="{{ $category->name }}">
    <x-header testo="Categoria: {{ $category->name }}" />

    <x-message />
    <div class="container my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <x-card 
                    :tags="$article->tags"
                    :title="$article->title"
                    :subtitle="$article->subtitle"
                    :image="$article->image"
                    :category="$article->category->name ?? 'nessuna categoria'"
                    :data="$article->created_at->format('d/m/Y')"
                    :user="$article->user->name"
                    url="{{ route('articles.show', compact('article')) }}"
                    urlCategory="{{ ( $article->category ? route('articles.byCategory', ['category' => $article->category->id]) : '#' ) }}"
                    urlUser="{{ route('articles.byUser', ['user' => $article->user->id]) }}"
                    readDuration="{{ $article->readDuration() }}"
                />
            </div>
            @endforeach
        </div>
    </div>
</x-layout>