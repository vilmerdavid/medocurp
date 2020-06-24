@if (Storage::exists($emp->logo))
    <img src="{{ Storage::url($emp->logo) }}" alt="" class="img-responsive" width="45px">
@endif