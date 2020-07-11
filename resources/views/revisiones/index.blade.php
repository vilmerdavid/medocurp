@extends('layouts.app')
@section('breadcrumbs', Breadcrumbs::render('home'))
@section('content')
@include('fichas_pi.menu')

<div class="container-fluid">
    <form action="{{ route('actualizarRevisionOrganosSistemas') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                I. REVISIÓN ACTUAL DE ÓRGANOS Y SISTEMAS
            </div>
            <div class="card-body">
                <input type="hidden" name="ficha" value="{{ $ficha->id }}">
                <div class="md-form md-outline my-0">
                    <input type="text" name="piel_y_anexos" id="piel_y_anexos" class="form-control @error('piel_y_anexos') is-invalid @enderror" value="{{ old('piel_y_anexos',$revision->piel_y_anexos??'') }}">
                    <label for="piel_y_anexos">Piel y anexos</label>
                    @error('piel_y_anexos')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="organos_de_los_sentidos" id="organos_de_los_sentidos" class="form-control @error('organos_de_los_sentidos') is-invalid @enderror" value="{{ old('organos_de_los_sentidos',$revision->organos_de_los_sentidos??'') }}">
                    <label for="organos_de_los_sentidos">Organos de los sentidos</label>
                    @error('organos_de_los_sentidos')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="respiratorio" id="respiratorio" class="form-control @error('respiratorio') is-invalid @enderror" value="{{ old('respiratorio',$revision->respiratorio??'') }}">
                    <label for="respiratorio">Respiratorio</label>
                    @error('respiratorio')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="cardio_vascular" id="cardio_vascular" class="form-control @error('cardio_vascular') is-invalid @enderror" value="{{ old('cardio_vascular',$revision->cardio_vascular??'') }}">
                    <label for="cardio_vascular">Cardio vascular</label>
                    @error('cardio_vascular')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="digestivo" id="digestivo" class="form-control @error('digestivo') is-invalid @enderror" value="{{ old('digestivo',$revision->digestivo??'') }}">
                    <label for="digestivo">Digestivo</label>
                    @error('digestivo')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="genito_urinario" id="genito_urinario" class="form-control @error('genito_urinario') is-invalid @enderror" value="{{ old('genito_urinario',$revision->genito_urinario??'') }}">
                    <label for="genito_urinario">Genito urinario</label>
                    @error('genito_urinario')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="musculo_esqueletico" id="musculo_esqueletico" class="form-control @error('musculo_esqueletico') is-invalid @enderror" value="{{ old('musculo_esqueletico',$revision->musculo_esqueletico??'') }}">
                    <label for="musculo_esqueletico">Músculo esqueletico</label>
                    @error('musculo_esqueletico')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="endocrino" id="endocrino" class="form-control @error('endocrino') is-invalid @enderror" value="{{ old('endocrino',$revision->endocrino??'') }}">
                    <label for="endocrino">Endócrino</label>
                    @error('endocrino')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="hemo_linfatico" id="hemo_linfatico" class="form-control @error('hemo_linfatico') is-invalid @enderror" value="{{ old('hemo_linfatico',$revision->hemo_linfatico??'') }}">
                    <label for="hemo_linfatico">Hemo linfatico</label>
                    @error('hemo_linfatico')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="md-form md-outline my-0">
                    <input type="text" name="nervioso" id="nervioso" class="form-control @error('nervioso') is-invalid @enderror" value="{{ old('nervioso',$revision->nervioso??'') }}">
                    <label for="nervioso">Nervioso</label>
                    @error('nervioso')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>

@prepend('scriptsHeader')
   
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('active')
        $('#menu_revisiones').addClass('active')
    </script>

@endpush

@endsection