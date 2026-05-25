<x-app-layout>

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold">
            My Applications
        </h1>

        <a href="{{ route('opportunities.index') }}"
           class="bg-indigo-600 text-white px-5 py-3 rounded-lg hover:bg-indigo-700">
            Browse Opportunities
        </a>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse($applications as $application)

            <div class="bg-white shadow-md rounded-xl p-6">

                <h2 class="text-2xl font-bold mb-4">
                    {{ $application->opportunity->title }}
                </h2>

                <p class="text-gray-600 mb-4">
                    Applied on:
                    {{ $application->created_at->format('d M Y') }}
                </p>

                <div class="mb-6">

                    @if($application->status === 'accepted')

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Accepted
                        </span>

                    @elseif($application->status === 'rejected')

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Rejected
                        </span>

                    @else

                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Pending
                        </span>

                    @endif

                </div>

                <a href="{{ route('opportunities.show', $application->opportunity->id) }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                    View Opportunity
                </a>

            </div>

        @empty

            <div class="bg-white shadow-md rounded-xl p-8">

                <p class="text-gray-600 text-lg">
                    You have not applied to any opportunities yet.
                </p>

            </div>

        @endforelse

    </div>

</x-app-layout>