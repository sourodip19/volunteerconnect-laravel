<x-app-layout>

    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-8">

        <h1 class="text-3xl font-bold mb-8">
            Edit Opportunity
        </h1>

        <form action="{{ route('opportunities.update', $opportunity->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Title
                </label>

                <input type="text"
                       name="title"
                       value="{{ $opportunity->title }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Category
                </label>

                <input type="text"
                       name="category"
                       value="{{ $opportunity->category }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Location
                </label>

                <input type="text"
                       name="location"
                       value="{{ $opportunity->location }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Date
                </label>

                <input type="date"
                       name="date"
                       value="{{ $opportunity->date }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Required Volunteers
                </label>

                <input type="number"
                       name="required_volunteers"
                       value="{{ $opportunity->required_volunteers }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Description
                </label>

                <textarea name="description"
                          rows="6"
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ $opportunity->description }}</textarea>

            </div>

            <div class="flex gap-4">

                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
                    Update Opportunity
                </button>

                <a href="{{ route('opportunities.index') }}"
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</x-app-layout>