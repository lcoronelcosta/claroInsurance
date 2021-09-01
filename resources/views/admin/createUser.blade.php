@extends('layouts.app')
@section('content')


<div class="container">
    <form method="POST" id="form" action="{{url('admin/createUser')}}">
        {!! csrf_field() !!}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nombre</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" id="inputName" name="inputName">
                <p id="msgNombre" class="warnings"></p>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <span class="text-danger">*</span>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                <p id="msgEmail" class="warnings"></p>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword">Contraseña</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="1 Caracter especial, mayusculas y números">
                <p id="msg" class="warnings"></p>
            </div>
            <div class="form-group col-md-6">
                <label for="confirmPass">Confirmar contraseña</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control" id="confirmPass" name="confirmPass">
                <p id="msgConfirm" class="warnings"></p>
            </div>
            <div class="form-group col-md-4">
                <label for="dateBirth">Fecha de nacimiento</label>
                <span class="text-danger">*</span>
                <input type="date" class="form-control" id="dateBirth" name="dateBirth" max="">
                <p id="msgDate" class="warnings"></p>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCel">Celular</label>
                <input type="number" class="form-control" id="inputCel"  name="inputCel">
                <p id="msgCel" class="warnings"></p>
            </div>

            <div class="form-group col-md-4">
                <label for="inputCc">Cedula</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" id="inputCc" name="inputCc">
                <p id="msgCc" class="warnings"></p>
            </div>
            

            <div class="form-group col-md-6">
                <label for="inputCountry">Pais</label>
                <span class="text-danger">*</span>

                <select name="inputCountry" id="countries" class="form-control">
                    <optgroup label="Selecciona un país">
                        <option value="" selected>-</option>
                        @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
                        @endforeach
                    </optgroup>
                </select>
                <p id="msgPais" class="warnings"></p>
            </div>

            <div class="form-group col-md-6">
                <label for="inputState">Estado</label>
                <span class="text-danger">*</span>
                <select name="inputState" id="states" class="form-control">
                    <optgroup label="Selecciona una estado">
                        
                    </optgroup>
                </select>
                <p id="msgState" class="warnings"></p>
            </div>

            <div class="form-group col-md-6">
                <label for="inputCity">Ciudad</label>
                <span class="text-danger">*</span>
                <select name="inputCity" id="ciudades" class="form-control">
                    <optgroup label="Selecciona una ciudad">
                        
                    </optgroup>
                </select>
                <p id="msgCiudad" class="warnings"></p>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>

<script>
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date range picker
    $('#reservationdate').datetimepicker({
        defaultDate: new Date(),
    	format:'YYYY-MM-DD'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD'
      }
    })

  })
</script>

<script type="text/javascript">
	var id_country = $('#countries');
	var id_state = $("#states");
    var id_ciudades = $("#ciudades");

	id_country.select2().on('change', function() {
	    $.ajax({
	    	data: {
	            id_country: id_country.val(),
	            "_token": "{{ csrf_token() }}",
	          },
	        url:"../ajax/estados", // if you say $(this) here it will refer to the ajax call not $('.company2')
	        type:'POST',
	        success:function(data) {
	        	console.log(data);
	            id_state.empty();
                id_ciudades.empty();
	            $.each(data.data, function(index, item) {

	                id_state.append($("<option></option>").attr("value", item.id).text(item.nombre)); // name refers to the objects value when you do you ->lists('name', 'id') in laravel
	            });
	            id_state.select2(); //reload the list and select the first option
	        }
	    });
	}).trigger('change');

    id_state.select2().on('change', function() {
	    $.ajax({
	    	data: {
	            id_state: id_state.val(),
	            "_token": "{{ csrf_token() }}",
	          },
	        url:"../ajax/ciudades", // if you say $(this) here it will refer to the ajax call not $('.company2')
	        type:'POST',
	        success:function(data) {
	        	console.log(data);
	            id_ciudades.empty();
	            $.each(data.data, function(index, item) {

	                id_ciudades.append($("<option></option>").attr("value", item.id).text(item.nombre)); // name refers to the objects value when you do you ->lists('name', 'id') in laravel
	            });
	            id_ciudades.select2(); //reload the list and select the first option
	        }
	    });
	}).trigger('change');
</script>

@endsection