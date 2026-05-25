<x-app-layout>

    <h1 class="text-3xl font-bold mb-8">
        Organization Dashboard
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-gray-500 text-sm">
                Total Opportunities
            </h2>

            <p class="text-4xl font-bold mt-2">
                {{ $totalOpportunities }}
            </p>
        </div>

        <div class="bg-blue-100 shadow-md rounded-xl p-6">
            <h2 class="text-blue-700 text-sm">
                Total Applicants
            </h2>

            <p class="text-4xl font-bold mt-2 text-blue-800">
                {{ $totalApplicants }}
            </p>
        </div>

        <div class="bg-green-100 shadow-md rounded-xl p-6">
            <h2 class="text-green-700 text-sm">
                Accepted Volunteers
            </h2>

            <p class="text-4xl font-bold mt-2 text-green-800">
                {{ $acceptedApplicants }}
            </p>
        </div>

        <div class="bg-yellow-100 shadow-md rounded-xl p-6">
            <h2 class="text-yellow-700 text-sm">
                Pending Applications
            </h2>

            <p class="text-4xl font-bold mt-2 text-yellow-800">
                {{ $pendingApplicants }}
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">

    <!-- Recent Opportunities -->

    <div class="bg-white shadow-lg rounded-2xl p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Recent Opportunities
            </h2>

            <a href="{{ route('opportunities.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">

                + Create

            </a>

        </div>

        @forelse(auth()->user()->opportunities->take(3) as $opportunity)

            <div class="border-b py-4">

                <div class="flex justify-between items-center">

                    <div>

                        <h3 class="font-semibold text-lg">
                            {{ $opportunity->title }}
                        </h3>

                        <p class="text-gray-500">
                            {{ $opportunity->location }}
                        </p>

                    </div>

                    <a href="{{ route('opportunities.edit', $opportunity->id) }}"
                       class="text-indigo-600 hover:underline">

                        Edit

                    </a>

                </div>

            </div>

        @empty

            <p class="text-gray-500">
                No opportunities created yet.
            </p>

        @endforelse

    </div>

    <!-- Recent Applicants -->

    <div class="bg-white shadow-lg rounded-2xl p-6">

        <h2 class="text-2xl font-bold mb-6">
            Recent Applicants
        </h2>

        @php

            $recentApplications = \App\Models\Application::whereIn(
                'opportunity_id',
                auth()->user()->opportunities->pluck('id')
            )->latest()->take(3)->get();

        @endphp

        @forelse($recentApplications as $application)

            <div class="border-b py-4">

                <div class="flex justify-between items-center">

                    <div>

                        <h3 class="font-semibold text-lg">
                            {{ $application->user->name }}
                        </h3>

                        <p class="text-gray-500">
                            Applied for:
                            {{ $application->opportunity->title }}
                        </p>

                    </div>

                    <div>

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

            </div>

        @empty

            <p class="text-gray-500">
                No applications yet.
            </p>

        @endforelse

    </div>

</div>
    <div class="mt-10">

        <a href="{{ route('opportunities.index') }}"
           class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
            Manage Opportunities
        </a>

    </div>

</x-app-layout>