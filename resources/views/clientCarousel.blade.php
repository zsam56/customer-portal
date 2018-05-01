@foreach ($clients as $client) 
	<div>Hello {{$client->name}}</div>
@endforeach