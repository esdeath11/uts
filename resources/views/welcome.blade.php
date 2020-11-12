@extends('header')

@section('content')
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
    <a class="navbar-brand" href="#">182410102080</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{route('create')}}">Create</a>
            </li>
        </ul>

    </div>
</nav>
<div class="container">
    <div class="col-8">
        {{-- @foreach((array)$blog as $b) --}}
        @foreach ($json as $item => $obj)
        <br>
        {{-- <div class="card">
        <img class="card-img-top" src="{{asset($b->image)}}" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $b->title}}</h5>
            <h5 class="card-title">author : {{$b->author}}</h5>
                <p class="card-text">{{$b->text}}</p>
            </div>
            
        </div> --}}
        <div class="card">
            <img class="card-img-top" src="{{asset($obj['image'])}}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$obj['title']}}</h5>
                <h5 class="card-title">author : {{$obj['author']}}</h5>
                    <p class="card-text">{{$obj['text']}}</p>
                </div>
                
            </div>
        <a name="" id="" class="btn btn-primary" href="{{route('ganti',['d'=>$item])}}" role="button">Edit</a>
        <a name="" id="" class="btn btn-primary" href="{{route('destroy',['f'=>$item])}}" style="background-color: red" role="button">Delete</a>
        @endforeach
    </div>
</div>
<!-- Footer -->
<footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#"> MSAY.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
@endsection
