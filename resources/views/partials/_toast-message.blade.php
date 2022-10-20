@if(session('msg'))
@push('js')
<script src="{{asset('toast/main.js')}}"></script>
<script>
    successToast("Enregistrement effectué !");
</script>
@endpush
@endif