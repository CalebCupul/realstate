  {{-- Custom Scripts --}}

  @include('sweetalert::alert')

  <script>
    $(document).on('click', '.btn-confirm', (e) => {
      let $this = $(e.target);
      Swal.fire({
        title: '¿Seguro que desea confirmar la operación?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#666',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, confimar!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          $this.closest('form').trigger('submit');
        }
      });
    });


    // Modal Spinner
    $("#spinner-modal").modal('hide');

    $(window).bind('beforeunload', function() {
      $("#spinner-modal").modal('show');
    });

    $(window).bind('unload', function() {
      $("#spinner-modal").modal('hide');
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('.select2').select2();
  </script>


  <!-- Modal Spinner -->
  <div class="modal " id="spinner-modal" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="spinner-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center text-light" role="document">
      <span class="fa fa-spinner fa-spin fa-3x w-100"></span>
    </div>
  </div>
