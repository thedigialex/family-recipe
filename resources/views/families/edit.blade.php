<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <x-fonts.sub-header>
                {{ __('Manage Family') }} - {{ $family->name }}
            </x-fonts.sub-header>
        </div>
    </x-slot>
    <x-container>
        <div>
            <h1 class="mb-8">Family Name: {{ $family->name }}</h1>
            <h2 class="mt-6">Pending Members</h2>
            @if($pendingMembers->isEmpty())
            <p>No pending requests.</p>
            @else
            <ul>
                @foreach($pendingMembers as $member)
                <li class="mb-2">
                    <h3>{{ $member->name }}</h3>
                    <form action="{{ route('families.approve', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                        @csrf
                        <x-secondary-button type="submit">Approve</x-secondary-button>
                    </form>
                    <form action="{{ route('families.remove', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                        @csrf
                        <x-primary-button type="submit">Deny</x-primary-button>
                    </form>
                </li>
                </br>
                @endforeach
            </ul>
            @endif

            <h2 class="mt-6">Approved Members</h2>
            @if($approvedMembers->isEmpty())
            <p>No approved members.</p>
            @else
            <ul>
                @foreach($approvedMembers as $member)
                <li class="mb-2">
                    <h3> @if($member->id === $family->head_id) <span class="font-bold text-sm text-primary">(Head of Household)</br></span> @endif{{ $member->name }}</h3>
                    @if($member->id !== $family->head_id)
                    <form action="{{ route('families.remove', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                        @csrf
                        <x-primary-button type="submit">Remove</x-primary-button>
                    </form>
                    @endif
                </li>
                @endforeach
            </ul>
            @endif

            <div class="mt-6 flex justify-end">
                <form action="{{ route('families.destroy', ['id' => $family->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Family</button>
                </form>
            </div>

        </div>
    </x-container>
</x-app-layout>