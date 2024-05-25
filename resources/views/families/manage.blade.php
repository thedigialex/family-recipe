<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Family Members') }} - {{ $family->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Family Name: {{ $family->name }}</h3>
                    <h3 class="text-lg font-bold mb-4">Pending Members</h3>
                    @if($pendingMembers->isEmpty())
                    <p>No pending requests.</p>
                    @else
                    <ul>
                        @foreach($pendingMembers as $member)
                        <li class="mb-2">
                            {{ $member->name }}
                            <form action="{{ route('families.approve', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Approve</button>
                            </form>
                            <form action="{{ route('families.remove', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <h3 class="text-lg font-bold mt-6 mb-4">Approved Members</h3>
                    @if($approvedMembers->isEmpty())
                    <p>No approved members.</p>
                    @else
                    <ul>
                        @foreach($approvedMembers as $member)
                        <li class="mb-2">
                            {{ $member->name }}
                            @if($member->id !== $family->head_id)
                            <form action="{{ route('families.remove', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Remove</button>
                            </form>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="mt-6">
                        <form action="{{ route('families.destroy', ['id' => $family->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Family</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>