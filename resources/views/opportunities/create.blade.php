<h1>Create Opportunity</h1>

<form action="{{ route('opportunities.store') }}" method="POST">

    @csrf

    <input type="text" name="title" placeholder="Title">
    <br><br>

    <input type="text" name="category" placeholder="Category">
    <br><br>

    <input type="text" name="location" placeholder="Location">
    <br><br>

    <input type="date" name="date">
    <br><br>

    <input type="number" name="required_volunteers" placeholder="Required Volunteers">
    <br><br>

    <textarea name="description" placeholder="Description"></textarea>
    <br><br>

    <button type="submit">
        Create Opportunity
    </button>

</form>