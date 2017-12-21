@extends("master")

@section("content")

<form method="POST" action={{ action('MovieController@show') }}>
{{csrf_field()}}
    <input type="text" name="id" value="tt2283362">
    <input value="Search ID" type="submit">
</form>

@endsection