  <script>
    $(document).ready(function() {


      var table = $('#{{ $model }}-table').DataTable({
        serverSide: true,
        language: {
          url: '{{ asset('vendor/datatables/es-mx.json') }}'
        },
        ajax: "{{ route($model . '.getIndexTable') }}",
        columns: [{
            name: 'id'
          },

          @foreach ($fields as $field)
            {
            @foreach ($field as $key => $value)
              {{ $key }}: '{{ $value }}',
            @endforeach
            },
          @endforeach
        ],
      });




      //   $('#{{ $model }}-table').css('cursor', 'pointer');

      //   $('#{{ $model }}-table tbody').on('click', 'tr', function() {
      //     var url = '{{ route($model . '.show', '#id#') }}';
      //     var data = table.row(this).data();

      //     window.location = url.replace('#id#', data[0]);
      //   });

    });
  </script>
