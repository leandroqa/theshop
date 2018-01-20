    <div class="col-lg-12">
      {{Form::open(['route' => 'buscarProdutos', 'method' => 'POST'])}}
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Procurar produto..." name="buscarpor" id="buscarpor">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Buscar!</button>
        </span>
      </div>
      {{Form::close()}}
    </div>
