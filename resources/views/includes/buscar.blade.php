<div class="modal fade " id="buscar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buscar usuarios en Minimal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body text-center">        
        <div class="small">¿Buscas a alguien en especial? Si existe en Minimal, aqui lo encontraras.</div>
        <form method="POST" id="buscar-form">
          @csrf
          <div class="md-form mx-0 mb-2">
            <input type="text" id="buscar" name="buscar" class="validate form-control ml-0 modal-color" required placeholder="Buscar">
            {{-- <label for="buscar" class="ml-0 modal-color">Nuevo nombre de usuario</label> --}}
          </div>
          <div id="alert-buscar" class="my-2 alert"></div>
          <div class="text-center mt-4">
            <button class="btn btn-primary text-center" id="btn-buscar">Buscar &nbsp;
              <i class="far fa-share-square" id="Ibuscar"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>