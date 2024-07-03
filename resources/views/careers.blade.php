<x-layout title="Lavora con noi">
    <x-header testo="Lavora con noi"/>
    <div class="container my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow">
            <div class="col-12 col-md-6">
                <h2>Lavora come amministratore</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolores ex 
                    molestias iure suscipit ullam distinctio aspernatur magnam alias fugiat et iusto asperiores laborum,
                     vero officiis cum, quasi enim eius!
                </p>
                <h2>Lavora come Revisore</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolores ex 
                    molestias iure suscipit ullam distinctio aspernatur magnam alias fugiat et iusto asperiores laborum,
                     vero officiis cum, quasi enim eius!
                </p>
                <h2>Lavora come Redattore</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolores ex 
                    molestias iure suscipit ullam distinctio aspernatur magnam alias fugiat et iusto asperiores laborum,
                     vero officiis cum, quasi enim eius!
                </p>
            </div>
            <div class="col-12 col-md-6">
                <x-errors />
                <form action="{{ route('careers.submit') }}" method="POST" class="p-5">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Scegli qui</option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class=" form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class=" form-label">Parlaci di te</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class=" btn btn-info text-white">Invia la tua Canditatura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>