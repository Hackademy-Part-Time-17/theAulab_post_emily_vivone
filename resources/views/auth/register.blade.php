<x-layout title="Registrati">
    <div class="container-fluid p-3 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-5">
                Registrati
            </h1>
            <p class=" fs-6">
                cosi da non perdere tutti gli aggiornamenti
            </p>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <x-errors />
                    <form class="card p-5 shadow" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username"class="form-label">Nome: </label>
                            <input name="name" type="text" class="form-control" id="username" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"> Email: </label>
                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"> Password: </label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"> Conferma Password: </label>
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                        </div>
                        <div class="mt-2">
                            <button class="btn bg-info text-white">Registrati </button>
                            <p cLass="small mt-2"> Già registrato? <a href="{{ route('login') }}">Clicca qui</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-layout >