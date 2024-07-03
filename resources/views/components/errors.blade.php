<div>
    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }} </1i>
                        @endforeach
                    </ul>
                </div>
    @endif
</div>