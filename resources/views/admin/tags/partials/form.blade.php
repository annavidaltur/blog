<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}
</div>
@error('name')
    <span class="text-danger">{{$message}}</span><br>
@enderror

<div class="form-group">
    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}
</div>
@error('color')
    <span class="text-danger">{{$message}}</span><br>
@enderror