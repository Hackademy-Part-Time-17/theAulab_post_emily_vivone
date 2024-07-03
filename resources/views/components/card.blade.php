<div class="card">
    <img src="{{ Storage::url($image) }}" alt="" class="card-img-top h-25">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text"> {{ $subtitle }}</p>
        @if($category!=null && $urlCategory!="#")
            <a href="{{ $urlCategory }}" class=" small text-muted d-flex justify-content-center align-items-center">{{ $category }}</a>
        @else
            <p class="small text-muted fst-italic text-capitalize d-flex justify-content-center m-0">
                Non categorizzato
            </p>
        @endif
        <span class="text-muted small fst-italic">Tempo di lettura: {{ $readDuration }}min</span>
        @if ($tags)
            <p class="small fst-italic text-capitalize">
                @foreach ($tags as $tag)
                    #{{ $tag->name }}
                @endforeach
            </p>
        @endif
    </div>
    <div class=" card-footer text-muted d-flex align-items-center">
        <p class=" m-0 small"> Redatto il {{ $data }}</p>
        <a href="{{$urlUser}}" class="small">Da: {{ $user }}</a>
        <a href="{{ $url }}" class=" btn btn-info text-white">Leggi</a>
    </div>
</div>