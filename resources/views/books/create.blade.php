<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::open(['route' => 'books.store']) !!}

    @form_maker_table("books")

    {!! Form::submit('Save') !!}

    {!! Form::close() !!}

</div>