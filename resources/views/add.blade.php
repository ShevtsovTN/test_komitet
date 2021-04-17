@extends('layout')
@section('content')
    <div class="container">
    @if(!empty($add))
    <table>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Text</th>
            <th scope="col">Banner</th>
        </tr>
        </thead>
        <tbody>
            <th class="align-middle" scope="row">{{$add->id}}</th>
            <td class="align-middle">{{$add->text}}</td>
            <td class="align-middle"><img width="50" height="50" src="{{asset('storage/' . $add->link)}}" alt="banner"></td>
        </tbody>
    </table>
    @endif
</div>
@endsection
