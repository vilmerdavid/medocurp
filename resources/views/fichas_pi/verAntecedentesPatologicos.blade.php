

<div class="card-body">
    <div class="md-form md-outline my-0">
        <input type="text" name="enf_cardio_vascular" id="enf_cardio_vascular" value="{{ old('enf_cardio_vascular',$patologico->enf_cardio_vascular??'No refiere') }}" class="form-control form-control-lg @error('enf_cardio_vascular') is-invalid @enderror" autofocus>
        <label for="enf_cardio_vascular" class="active" >Enfermedad cardio vascular</label>
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
        <label for="enf_metabolica" class="active">Enfermedad metabólicagjgfj</label>
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
        <label for="enf_neurologica" class="active">Enfermedad neurologica</label>
        @error('enf_neurologica')
            <span>
                <strong>
                    {{ $message }}
    </div>
    <div class="md-form md-outline my-0">
        <input type="text" name="enf_oncologica" id="enf_oncologica" value="{{ old('enf_oncologica',$patologico->enf_oncologica??'No refiere') }}" class="form-control @error('enf_oncologica') is-invalid @enderror">
        <label for="enf_oncologica" class="active">Enfermedad oncológica</label>
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
        <label for="enf_infecciosa" class="active">Enfermedad infecciosa</label>
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
        <label for="enf_herd_cong" class="active">Enfermedad herd/cong</label>
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
        <label for="discapacidades" class="active">Discapacidades</label>
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
        <label for="otras" class="active">Otras</label>
        @error('otras')
            <span>
                <strong>
                    {{ $message }}
                </strong>
            </span>                        
        @enderror
    </div>
</div>