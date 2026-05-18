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