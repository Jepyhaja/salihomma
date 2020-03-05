@foreach($data as $item)
    <div>{{$item['name']}}</div>
@endforeach

<form action="/list-exercises" method="post">
@csrf
@method('POST')

<label for="">Name</label>
<input type="text" name="name">
<label for="">Description</label>
<input type="text" name="description">
<label for="">Link to media</label>
<input type="text" name="media_url">
<label for="">For beginners</label>
<input type="checkbox" name="is_beginner_friendly">
<label for="">Cardio</label>
<input type="checkbox" name="is_cardio">
<button type="submit">Send</button>

</form>