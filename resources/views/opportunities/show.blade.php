<h1>Opportunity Details</h1>

<hr>

<h2>{{ $opportunity->title }}</h2>

<p>
    <strong>Category:</strong>
    {{ $opportunity->category }}
</p>

<p>
    <strong>Location:</strong>
    {{ $opportunity->location }}
</p>

<p>
    <strong>Date:</strong>
    {{ $opportunity->date }}
</p>

<p>
    <strong>Required Volunteers:</strong>
    {{ $opportunity->required_volunteers }}
</p>

<p>
    <strong>Description:</strong>
    {{ $opportunity->description }}
</p>
@if(auth()->user()->role === 'organization')

    <hr>

    <h2>Applicants</h2>

    @forelse($opportunity->applications as $application)

        <p>
            <strong>Name:</strong>
            {{ $application->user->name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $application->user->email }}
        </p>

        <p>
            <strong>Status:</strong>
            {{ $application->status }}
        </p>

        <hr>

    @empty

        <p>No applications yet.</p>

    @endforelse

@endif

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif
@if(auth()->user()->role === 'volunteer')

    @php
        $alreadyApplied = $opportunity->applications
            ->where('user_id', auth()->user()->id)
            ->count();
    @endphp

    @if($alreadyApplied)

        <p>
            You have already applied for this opportunity.
        </p>

    @else

        <form action="{{ route('applications.store', $opportunity->id) }}"
              method="POST">

            @csrf

            <button type="submit">
                Apply Now
            </button>

        </form>

    @endif

@endif