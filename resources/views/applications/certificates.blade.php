<x-app-layout>

    <h1 class="text-3xl font-bold mb-8">
        My Certificates
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse($applications as $application)

            <div class="bg-white shadow-lg rounded-2xl p-6">

                <h2 class="text-2xl font-bold mb-4">
                    {{ $application->opportunity->title }}
                </h2>

                <p class="text-gray-600 mb-2">
                    Issued By:
                    VolunteerConnect Organization
                </p>

                <p class="text-gray-600 mb-6">
                    Issued On:
                    {{ $application->updated_at->format('d M Y') }}
                </p>

                <a href="{{ route(
                    'applications.download-certificate',
                    $application->id
                ) }}"
                   class="bg-indigo-600 text-white px-5 py-3 rounded-lg hover:bg-indigo-700">

                    Download Certificate

                </a>

            </div>

        @empty

            <div class="bg-white shadow-lg rounded-2xl p-8">

                <p class="text-gray-600">
                    No certificates issued yet.
                </p>

            </div>

        @endforelse

    </div>

</x-app-layout>