@extends('article::layouts.master')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h2>Articles</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 mt-1 mr-1">
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('article.create') }}"> Create New rticle</a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ \Str::limit($article->body, 50) }}</td>
                        <td>
                            <form action="{{ route('article.destroy',$article->id) }}" method="POST">

                                <a class="btn btn-primary" href="{{ route('article.edit',$article->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

    {{-- {!! $articles->links() !!} --}}

{{-- <div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                <a href="posts/create" class="btn btn-primary mb-2">Create Post</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Published At</th>
                            <th>Created at</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ date('Y-m-d', strtotime($article->created_at)) }}</td>
                            <td>
                            <a href="article/{{$article->id}}/edit" class="btn btn-primary">Edit</a>
                            <form action="article/{{$article->id}}" method="post" class="d-inline">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div> --}}
@endsection
