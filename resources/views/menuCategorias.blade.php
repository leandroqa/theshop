@foreach($categorias as $categoria)
  @component('components.menu')
    @slot('categoria')
        {{$categoria->nome}}
    @endslot
    @slot('url')
      /{{$categoria->slug}}
    @endslot
    @if(strtolower($cat) == $categoria->slug)
      @slot('active')
        active
      @endslot
    @else
      @slot('active')
      @endslot
    @endif
  @endcomponent
@endforeach
