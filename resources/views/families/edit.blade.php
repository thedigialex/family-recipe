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
            <x-fonts.header>Family Name: {{ $family->name }}</x-fonts.header>
            <x-fonts.accent-header>Head of Household: {{ $family->head->name }}</x-fonts.accent-header>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <x-fonts.sub-header>Pending Members</x-fonts.sub-header>
                    @if($pendingMembers->isEmpty())
                    <x-fonts.paragraph>No pending requests.</x-fonts.paragraph>
                    @else
                    <ul>
                        @foreach($pendingMembers as $member)
                        <li class="mb-2">
                            <x-fonts.accent-header>{{ $member->name }}</x-fonts.accent-header>
                            <form action="{{ route('families.approve', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                                @csrf
                                <x-secondary-button type="submit">Approve</x-secondary-button>
                            </form>
                            <form action="{{ route('families.remove', ['familyId' => $family->id, 'userId' => $member->id]) }}" method="POST" class="inline">
                                @csrf
                                <x-primary-button type="submit">Deny</x-primary-button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <!-- Approved Members -->
                <div>
                    <x-fonts.sub-header>Approved Members</x-fonts.sub-header>
                    @if($approvedMembers->isEmpty())

                    <x-fonts.paragraph>No approved members.</x-fonts.paragraph>

                    @else
                    <ul>
                        @foreach($approvedMembers as $member)
                        <li class="mb-2">
                            <x-fonts.accent-header>
                                {{ $member->name }}
                            </x-fonts.accent-header>
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
                </div>
            </div>

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