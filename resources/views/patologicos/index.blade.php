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
                <button class="btn btn-sm btn-primary float-right" type="button" onclick="verAntecedentesPatologicos(this);">(REVISAR ANTERIORES)</button>
            </div>
            <div class="card-body">
                <div class="md-form md-outline my-0">
                    <input type="text" name="enf_cardio_vascular" id="enf_cardio_vascular" value="{{ old('enf_cardio_vascular',$patologico->enf_cardio_vascular??'No refiere') }}" class="form-control  @error('enf_cardio_vascular') is-invalid @enderror" autofocus>
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
                    <label for="discapacidades"><strong>Discapacidades</strong></label>
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

<div class="modal fade" id="modalRevisar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelRes" aria-hidden="true">
    <div class="modal-dialog modal-fluid" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelRes"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalbodyRes">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@prepend('scriptsHeader')
    {{-- confirm --}}
    <link rel="stylesheet" href="{{ asset('js/confirm/jquery-confirm.min.css') }}">
    <script src="{{ asset('js/confirm/jquery-confirm.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endprepend

@push('scriptsFooter')

    <script>
        $('#menuFichas').addClass('bg-danger')
        $('#menu_patologicos').addClass('active')

        var idFicha="{{ $ficha->id }}";

        function verAntecedentesPatologicos(arg){
            var hc="{{ $ficha->user_m->historia_clinica_ci??'' }}";

            
            $('#modalRevisar').modal('show');
            $('#exampleModalLabelRes').html('ANTECEDENTES PATOLÓGICOS FAMILIARES (DETALLAR PARENTESCO)')
            $('#modalbodyRes').load("{{ route('verAntecedentesPatologicosFamiliares') }}",{hc: hc,ficha:idFicha},function(){
            })
            
        }
        
    </script>

@endpush

@endsection
