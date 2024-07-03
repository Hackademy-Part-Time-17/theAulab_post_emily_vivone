<table class="table table-striped table-hover border">
    <thead class=" table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Tag</th>
            <th scope="col">Q.tà articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>  
                <th scope="row">{{ $metaInfo->name }}</th>  
                <th scope="row">
                    @if ($metaInfo->articles)
                        {{ count($metaInfo->articles) }}
                    @endif
                </th>
                @if ($metaType == 'tags')
                    <td>
                        <form action="{{ route('admin.editTag', $metaInfo) }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline">
                            <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteTag', $metaInfo) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white">Elimina</button>
                        </form>
                    </td> 
                @else
                    <td>
                        <form action="{{ route('admin.editCategory', $metaInfo) }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="text" name="name" placeholder="Nuovo nome Categoria" class="form-control w-50 d-inline">
                            <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteCategory', $metaInfo) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger text-white">Elimina</button>
                        </form>
                    </td>
                @endif
            </tr>
            
        @endforeach
    </tbody>
</table>