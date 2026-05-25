<x-app-layout>

    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl p-8">

        <h1 class="text-3xl font-bold mb-8">
            Create Opportunity
        </h1>

        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">

                <ul class="list-disc list-inside">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('opportunities.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf

            <!-- Title -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Title
                </label>

                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="Enter opportunity title"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Category -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Category
                </label>

                <input type="text"
                       name="category"
                       value="{{ old('category') }}"
                       placeholder="Cleaning, Education, Health..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Location -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Location
                </label>

                <input type="text"
                       name="location"
                       value="{{ old('location') }}"
                       placeholder="Enter location"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Date -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Date
                </label>

                <input type="date"
                       name="date"
                       value="{{ old('date') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Required Volunteers -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Required Volunteers
                </label>

                <input type="number"
                       name="required_volunteers"
                       value="{{ old('required_volunteers') }}"
                       placeholder="Enter number"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

            </div>

            <!-- Image -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Opportunity Image
                </label>

                <input type="file"
                       name="image"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3">

            </div>

            <!-- Description -->

            <div>

                <label class="block text-sm font-semibold mb-2">
                    Description
                </label>

                <textarea name="description"
                          rows="6"
                          placeholder="Describe the opportunity..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description') }}</textarea>

            </div>

            <!-- Submit -->

            <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">

                Create Opportunity

            </button>

        </form>

    </div>

</x-app-layout>