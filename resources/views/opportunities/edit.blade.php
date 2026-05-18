<h1>Edit Opportunity</h1>

<form action="{{ route('opportunities.update', $opportunity->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="title"
           value="{{ $opportunity->title }}"
           placeholder="Title">

    <br><br>

    <input type="text"
           name="category"
           value="{{ $opportunity->category }}"
           placeholder="Category">

    <br><br>

    <input type="text"
           name="location"
           value="{{ $opportunity->location }}"
           placeholder="Location">

    <br><br>

    <input type="date"
           name="date"
           value="{{ $opportunity->date }}">

    <br><br>

    <input type="number"
           name="required_volunteers"
           value="{{ $opportunity->required_volunteers }}"
           placeholder="Required Volunteers">

    <br><br>

    <textarea name="description">{{ $opportunity->description }}</textarea>

    <br><br>

    <button type="submit">
        Update Opportunity
    </button>

</form>