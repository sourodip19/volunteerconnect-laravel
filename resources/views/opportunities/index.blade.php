<h1>All Opportunities</h1>

@if(auth()->user()->role === 'organization')

    <a href="{{ route('opportunities.create') }}">
        Create Opportunity
    </a>

@endif

<hr>

@foreach($opportunities as $opportunity)

    <h2>{{ $opportunity->title }}</h2>

    <a href="{{ route('opportunities.show', $opportunity->id) }}">
        View Details
    </a>

    @if(auth()->user()->role === 'organization')

        <a href="{{ route('opportunities.edit', $opportunity->id) }}">
            Edit
        </a>

        <form action="{{ route('opportunities.destroy', $opportunity->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>

        </form>

    @endif

    <p>{{ $opportunity->category }}</p>

    <p>{{ $opportunity->location }}</p>

    <p>{{ $opportunity->date }}</p>

    <p>{{ $opportunity->required_volunteers }}</p>

    <p>{{ $opportunity->description }}</p>

    <hr>

@endforeach