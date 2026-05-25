<x-app-layout>

    <h1 class="text-3xl font-bold mb-8">
        Volunteer Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-gray-500 text-sm">Total Applications</h2>
            <p class="text-4xl font-bold mt-2">
                {{ $totalApplications }}
            </p>
        </div>

        <div class="bg-green-100 shadow-md rounded-xl p-6">
            <h2 class="text-green-700 text-sm">Accepted</h2>
            <p class="text-4xl font-bold mt-2 text-green-800">
                {{ $acceptedApplications }}
            </p>
        </div>

        <div class="bg-yellow-100 shadow-md rounded-xl p-6">
            <h2 class="text-yellow-700 text-sm">Pending</h2>
            <p class="text-4xl font-bold mt-2 text-yellow-800">
                {{ $pendingApplications }}
            </p>
        </div>

        <div class="bg-red-100 shadow-md rounded-xl p-6">
            <h2 class="text-red-700 text-sm">Rejected</h2>
            <p class="text-4xl font-bold mt-2 text-red-800">
                {{ $rejectedApplications }}
            </p>
        </div>

    </div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">

    <!-- Recent Applications -->

    <div class="bg-white shadow-lg rounded-2xl p-6">

        <h2 class="text-2xl font-bold mb-6">
            Recent Applications
        </h2>

        @forelse(auth()->user()->applications->take(3) as $application)

            <div class="border-b py-4">

                <h3 class="font-semibold text-lg">
                    {{ $application->opportunity->title }}
                </h3>

                <p class="text-gray-500">
                    {{ $application->created_at->diffForHumans() }}
                </p>

                <div class="mt-2">

                    @if($application->status === 'accepted')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Accepted
                        </span>

                    @elseif($application->status === 'rejected')

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Rejected
                        </span>

                    @else

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Pending
                        </span>

                    @endif

                </div>

            </div>

        @empty

            <p class="text-gray-500">
                No recent applications.
            </p>

        @endforelse

    </div>

    <!-- Quick Actions -->

    <div class="bg-white shadow-lg rounded-2xl p-6">

        <h2 class="text-2xl font-bold mb-6">
            Quick Actions
        </h2>

        <div class="space-y-4">

            <a href="{{ route('applications.index') }}"
               class="block bg-indigo-600 text-white px-6 py-4 rounded-xl hover:bg-indigo-700">

                View My Applications

            </a>

            <a href="{{ route('opportunities.index') }}"
               class="block bg-gray-800 text-white px-6 py-4 rounded-xl hover:bg-gray-900">

                Browse Opportunities

            </a>

        </div>

    </div>

</div>
  

</x-app-layout>