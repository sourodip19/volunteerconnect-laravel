<x-app-layout>

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold">
            Opportunities
        </h1>

        @if(auth()->user()->role === 'organization')

            <a href="{{ route('opportunities.create') }}"
               class="bg-indigo-600 text-white px-5 py-3 rounded-lg hover:bg-indigo-700">
                Create Opportunity
            </a>

        @endif

    </div>
<form method="GET"
      action="{{ route('opportunities.index') }}"
      class="bg-white shadow-md rounded-xl p-6 mb-8">

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <!-- Search -->

        <input type="text"
               name="search"
               placeholder="Search opportunities..."
               value="{{ request('search') }}"
               class="border border-gray-300 rounded-lg px-4 py-3">

        <!-- Category -->

      <select name="category"
        class="border border-gray-300 rounded-lg px-4 py-3">

    <option value="">
        All Categories
    </option>

    <option value="Cleaning"
        {{ request('category') == 'Cleaning' ? 'selected' : '' }}>
        Cleaning
    </option>

    <option value="Education"
        {{ request('category') == 'Education' ? 'selected' : '' }}>
        Education
    </option>

    <option value="Health"
        {{ request('category') == 'Health' ? 'selected' : '' }}>
        Health
    </option>

</select>

        <!-- Location -->

        <input type="text"
               name="location"
               placeholder="Location"
               value="{{ request('location') }}"
               class="border border-gray-300 rounded-lg px-4 py-3">

        <!-- Button -->

        <button type="submit"
                class="bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">

            Search

        </button>

    </div>

</form>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($opportunities as $opportunity)

            <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition">

            @if($opportunity->image)

    <img src="{{ asset('storage/' . $opportunity->image) }}"
         alt="Opportunity Image"
         class="w-full h-48 object-cover rounded-lg mb-4">

@endif
                <h2 class="text-2xl font-bold mb-3">
                    {{ $opportunity->title }}
                </h2>

                <div class="space-y-2 text-gray-700">

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

                </div>

                <p class="mt-4 text-gray-600 line-clamp-3">
                    {{ $opportunity->description }}
                </p>

                <div class="mt-6 flex flex-wrap gap-3">

                    <a href="{{ route('opportunities.show', $opportunity->id) }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                        View Details
                    </a>

                    @if(auth()->user()->role === 'organization')

                        <a href="{{ route('opportunities.edit', $opportunity->id) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">
                            Edit
                        </a>

                        <form action="{{ route('opportunities.destroy', $opportunity->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Delete
                            </button>

                        </form>

                    @endif

                </div>

            </div>

        @endforeach

    </div>

</x-app-layout>