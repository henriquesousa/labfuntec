
@foreach($recibos as $recibo)


    {{ $recibo->cliente->nome }} <br/>

    @foreach($recibo->analise as $analise)
        {{ $analise->id }}
        @endforeach
    <hr>
@endforeach

