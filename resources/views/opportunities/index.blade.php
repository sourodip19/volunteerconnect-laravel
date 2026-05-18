<h1>All Opportunities</h1>

<a href="{{ route('opportunities.create') }}">
    Create Opportunity
</a>

<hr>

@foreach($opportunities as $opportunity)

    <h2>{{ $opportunity->title }}</h2>

    <p>{{ $opportunity->category }}</p>

    <p>{{ $opportunity->location }}</p>

    <p>{{ $opportunity->date }}</p>

    <p>{{ $opportunity->required_volunteers }}</p>

    <p>{{ $opportunity->description }}</p>

    <hr>

@endforeach