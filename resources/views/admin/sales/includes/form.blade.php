        <div class="row p-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-row">
                    <div class="col-6">
                        <label for="country_id">País</label>
                        <select name="country_id" id="country-dd" class="form-control">
                        <option value="" selected disabled>Seleccionar país</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{ $country->country_name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="state_id">Estado</label>
                        <select name="state_id" id="state-dd" class="form-control">
                        </select>
                    </div>
                </div>

                <div class="form-row mt-2">
                    <div class="col-6">
                        <label for="city_id">Ciudad</label>
                        <select name="city_id" id="city-dd" class="form-control">
                        </select></div>
                    <div class="col-6">
                        <label for="suburb_id">Colonia</label>
                        <select name="suburb_id" id="suburb-dd" class="form-control">
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-row mt-2">
                    <div class="col-4">
                    {!! Form::label('price', 'Precio') !!}
                    
                        {!! Form::number('price', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="col-4">
                                <label for="property_type">Tipo de propiedad</label>
                                <select name="property_type" class="form-control">
                                <option value="" selected disabled>Seleccionar</option>
                                @foreach ($property_types as $property_type)
                                    <option value="{{$property_type}}">{{ $property_type }}</option>
                                @endforeach
                                </select>
                    </div>
                    <div class="col-4">
                                <label for="sale_type">Tipo de venta</label>
                                <select name="sale_type" class="form-control">
                                <option value="" selected disabled>Seleccionar</option>
                                @foreach ($sale_types as $sale_type)
                                    <option value="{{$sale_type}}">{{ $sale_type }}</option>
                                @endforeach
                                </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-row mt-2">
                    <div class="col-6">
                    {!! Form::label('street', 'Calle') !!}
                    {!! Form::text('street', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="col-6">
                    {!! Form::label('house', 'Imagen') !!}
                    {!! Form::file('house', array('class' => 'form-control-file')) !!}
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mt-2">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, array('class' => 'form-control', 'rows' => '5'), ) !!}
                </div>
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
    $(document).ready(function () {
        $('#country-dd').on('change', function () {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{route('getStates')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option selected disabled value="">Seleccionar estado</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.state_name + '</option>');
                    });
                }
            });
        });
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{route('getCities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option selected disabled  value="">Seleccionar ciudad</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.city_name + '</option>');
                    });
                }
            });
        });
        $('#city-dd').on('change', function () {
            var idCity = this.value;
            $("#suburb-dd").html('');
            $.ajax({
                url: "{{route('getSuburbs')}}",
                type: "POST",
                data: {
                    city_id: idCity,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#suburb-dd').html('<option value="">Seleccionar ciudad</option>');                        
                    $.each(res.suburbs, function (key, value) {
                        $("#suburb-dd").append('<option value="' + value
                            .id + '">' + value.suburb_name + '</option>');
                    });

                    $('#suburb-dd').on('change', function(){
                        var idSuburb = this.value;

                        // Busca dentro del objeto por el Id de la colonia
                        var suburbInfo = $.grep(res.suburbs, function(res){
                            return res.id == idSuburb;
                        });

                        const totalMale = document.getElementById('total-male');
                        totalMale.innerHTML = suburbInfo[0].total_male;

                        const totalFemale = document.getElementById('total-female');
                        totalFemale.innerHTML = suburbInfo[0].total_female;

                        const totalPopulation = document.getElementById('total-population');
                        totalPopulation.innerHTML = suburbInfo[0].total_population;

                        const preSalePrice = document.getElementById('sale_m2');
                        preSalePrice.innerHTML = '$' + suburbInfo[0].pre_sale_m2 + ' pesos.';

                        const salePrice = document.getElementById('pre_sale_m2');
                        salePrice.innerHTML = '$' + suburbInfo[0].sale_m2 + ' pesos.';
                    });
                }
            });
        });
        
    });
</script>
