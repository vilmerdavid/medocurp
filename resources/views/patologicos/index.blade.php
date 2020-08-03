@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <form action="{{ route('actualizarPatologico') }}" method="POST">
        @csrf
        <input type="hidden" name="ficha" value="{{ $ficha->id }}">
        <div class="card">
            <div class="card-header">
                E. ANTECEDENTES PATOLÓGICOS FAMILIARES (DETALLAR PARENTESCO)
            </div>
            <div class="card-body">
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_cardio_vascular" id="enf_cardio_vascular" value="{{ old('enf_cardio_vascular',$patologico->enf_cardio_vascular??'No refiere') }}" class="form-control form-control-lg @error('enf_cardio_vascular') is-invalid @enderror" autofocus>
                    <label for="enf_cardio_vascular" >Enfermedad cardio vascular</label>
                    @error('enf_cardio_vascular')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_metabolica" id="enf_metabolica" value="{{ old('enf_metabolica',$patologico->enf_metabolica??'No refiere') }}" class="form-control @error('enf_metabolica') is-invalid @enderror">
                    <label for="enf_metabolica">Enfermedad metabólica</label>
                    @error('enf_metabolica')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_neurologica" id="enf_neurologica" value="{{ old('enf_neurologica',$patologico->enf_neurologica??'No refiere') }}" class="form-control @error('enf_neurologica') is-invalid @enderror">
                    <label for="enf_neurologica">Enfermedad neurologica</label>
                    @error('enf_neurologica')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_oncologica" id="enf_oncologica" value="{{ old('enf_oncologica',$patologico->enf_oncologica??'No refiere') }}" class="form-control @error('enf_oncologica') is-invalid @enderror">
                    <label for="enf_oncologica">Enfermedad oncológica</label>
                    @error('enf_oncologica')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_infecciosa" id="enf_infecciosa" value="{{ old('enf_infecciosa',$patologico->enf_infecciosa??'No refiere') }}" class="form-control @error('enf_infecciosa') is-invalid @enderror">
                    <label for="enf_infecciosa">Enfermedad infecciosa</label>
                    @error('enf_infecciosa')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_herd_cong" id="enf_herd_cong" value="{{ old('enf_herd_cong',$patologico->enf_herd_cong??'No refiere') }}" class="form-control @error('enf_herd_cong') is-invalid @enderror">
                    <label for="enf_herd_cong">Enfermedad herd/cong</label>
                    @error('enf_herd_cong')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="discapacidades" id="discapacidades" value="{{ old('discapacidades',$patologico->discapacidades??'No refiere') }}" class="form-control @error('discapacidades') is-invalid @enderror">
                    <label for="discapacidades">Discapacidades</label>
                    @error('discapacidades')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="otras" id="otras" value="{{ old('otras',$patologico->otras??'No refiere') }}" class="form-control @error('otras') is-invalid @enderror">
                    <label for="otras">Otras</label>
                    @error('otras')
                        <span>
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>                        
                    @enderror
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </div>
    </form>
</div>

@prepend('scriptsHeader')
    {{-- confirm --}}
    <link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_patologicos').addClass('active')
    </script>

@endpush

@endsection
