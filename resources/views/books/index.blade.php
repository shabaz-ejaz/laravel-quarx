<div class="container">

    <div class="">
        {{ Session::get('message') }}
    </div>

    <div class="row">
        <div class="pull-right">
            {!! Form::open(['route' => 'books.search']) !!}
            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
            {!! Form::close() !!}
        </div>
        <h1 class="pull-left">Books</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('books.create') !!}">Add New</a>
    </div>

    <div class="row">
        @if($books->isEmpty())
            <div class="well text-center">No books found.</div>
        @else
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th width="50px">Action</th>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>
                            <a href="{!! route('books.edit', [$book->id]) !!}">{{ $book->name }}</a>
                        </td>
                        <td>
                            <a href="{!! route('books.edit', [$book->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                            <form method="post" action="{!! route('books.destroy', [$book->id]) !!}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="row">
                {!! $books; !!}
            </div>
        @endif
    </div>
</div>