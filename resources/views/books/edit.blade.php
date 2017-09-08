<div class="">
    {{ Session::get('message') }}
</div>

<div class="container">

    {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'patch']) !!}

    @form_maker_object($book, FormMaker::getTableColumns('books'))

    {!! Form::submit('Update') !!}

    {!! Form::close() !!}
</div>
