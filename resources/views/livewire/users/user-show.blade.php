<div class="px-4 sm:px-6 lg:px-8">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1" class="text-center sm:text-left">{{ __('Show User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-center sm:text-left">{{ __('Details of the user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="flex flex-col sm:flex-row sm:justify-between items-center">
        <flux:button
            href="{{ route('users.index') }}"
            icon:trailing="arrow-uturn-left"
            class="mb-4 sm:mb-0"
        >
            {{ __('Back') }}
        </flux:button>
    </div>
    <div class="w-full max-w-md mx-auto mt-6">
        <flux:fieldset>
            <flux:legend>Detalhes do usuário #{{ $user->id }}</flux:legend>

            <div class="space-y-6">
                <flux:input 
                    value="{{ $user->name }}" 
                    label="Nome" 
                    disabled 
                    class="w-full" 
                />
                <flux:input 
                    value="{{ $user->email }}" 
                    label="Email" 
                    disabled 
                    class="w-full" 
                />
                <flux:input 
                    value="{{ $user->role }}" 
                    label="Função" 
                    disabled 
                    class="w-full" 
                />
            </div>
        </flux:fieldset>
        <div class="mt-6 flex space-x-2">
            <flux:button
                href="{{ route('users.edit', $user->id) }}"
                variant="primary"
                icon="pencil-square"
                class="w-full"
            >
                {{ __('Edit User') }}
            </flux:button>
            <flux:button
                wire:click="delete({{ $user->id }})" 
                wire:confirm="Tem certeza que deseja excluir este usuário?"
                variant="danger"
                icon="trash"
                class="w-full"
            >
                {{ __('Delete User') }}
            </flux:button>
        </div>
    </div>
</div>
