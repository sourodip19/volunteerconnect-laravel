<x-app-layout>

    <div class="bg-white shadow-xl rounded-2xl p-8">

        <div class="flex justify-between items-start">

            <div>
                @if($opportunity->image)

    <img src="{{ asset('storage/' . $opportunity->image) }}"
         alt="Opportunity Image"
         class="w-full h-96 object-cover rounded-xl mb-8">

@endif
                <h1 class="text-4xl font-bold mb-4">
                    {{ $opportunity->title }}
                </h1>

                <div class="space-y-3 text-gray-700">

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

            </div>

            <div>

                <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-sm font-semibold">
                    Volunteer Opportunity
                </span>

            </div>

        </div>

        <hr class="my-8">

        <div>

            <h2 class="text-2xl font-bold mb-4">
                Description
            </h2>

            <p class="text-gray-700 leading-8">
                {{ $opportunity->description }}
            </p>

        </div>

        <!-- Success/Error Messages -->

        <div class="mt-6">

            @if(session('success'))

                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>

            @endif

            @if(session('error'))

                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4">
                    {{ session('error') }}
                </div>

            @endif

        </div>

        <!-- Volunteer Apply Section -->

        @if(auth()->user()->role === 'volunteer')

            @php
                $alreadyApplied = $opportunity->applications
                    ->where('user_id', auth()->id())
                    ->count();
            @endphp

            <div class="mt-8">

                @if($alreadyApplied)

                    <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded-lg">
                        You have already applied for this opportunity.
                    </div>

                @else

                    <form action="{{ route('applications.store', $opportunity->id) }}"
                          method="POST">

                        @csrf

                        <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
                            Apply Now
                        </button>

                    </form>

                @endif

            </div>

        @endif

    </div>

    <!-- Organization Applicant Section -->

    @if(auth()->user()->role === 'organization')

        <div class="mt-10">

            <h2 class="text-3xl font-bold mb-6">
                Applicants
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @forelse($opportunity->applications as $application)

                    <div class="bg-white shadow-md rounded-xl p-6">

                        <h3 class="text-xl font-bold mb-2">
                            {{ $application->user->name }}
                        </h3>

                        <p class="text-gray-600 mb-2">
                            {{ $application->user->email }}
                        </p>

                      <div>

    @if($application->status === 'accepted')

        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            Accepted
        </span>

        @if($application->certificate_issued)

            <div class="mt-3">

                <span class="bg-green-200 text-green-800 px-4 py-2 rounded-lg inline-block">

                    Certificate Issued

                </span>

            </div>

        @else

            <div class="mt-3">

                <a href="{{ route('applications.certificate', $application->id) }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded-lg inline-block hover:bg-indigo-700">

                    Issue Certificate

                </a>

            </div>

        @endif

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

                        @if($application->status === 'pending')

                            <div class="flex gap-3">

                                <form action="{{ route('applications.accept', $application->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                        Accept
                                    </button>

                                </form>

                                <form action="{{ route('applications.reject', $application->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button type="submit"
                                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                        Reject
                                    </button>

                                </form>

                            </div>

                        @endif

                    </div>

                @empty

                    <div class="bg-white shadow-md rounded-xl p-6">
                        No applications yet.
                    </div>

                @endforelse

            </div>

        </div>

    @endif

</x-app-layout>