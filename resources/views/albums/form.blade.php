<!-- Album name -->
<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => '',]) !!}
    {!! Form::text('name', null,
        [
            'class' => 'form-control',
            'autofocus' => '',
            'placeholder' => 'Enter an album name'
        ])
    !!}
</div>

<!-- Description -->
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => '',]) !!}
    {!! Form::textarea('description', null,
        [
            'class' => 'form-control',
             'placeholder' => 'Some things about the album',
             'rows' => 2
         ])
     !!}
</div>