<div class="px-4 sm:px-6 lg:px-8">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1" class="text-center sm:text-left">{{ __('Edit User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-center sm:text-left">{{ __('Form for editing user') }}</flux:subheading>
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
        <form wire:submit="submit" class="mt-6 space-y-6">
            <flux:input wire:model="name" label="Nome" placeholder="Digite o nome" class="w-full" />

            <flux:input wire:model="email" label="E-mail" placeholder="Digite o email" description="Este será usado para login." type="email" class="w-full" />

            <flux:input wire:model="password" label="Senha" description="Escolha uma senha forte." type="password" class="w-full" />

            <flux:input wire:model="password_confirmation" label="Confirmar Senha" description="Repita a senha." type="password" class="w-full" />

            <flux:button variant="primary" type="submit" class="w-full">
                {{ __('Submit') }}
            </flux:button>
        </form>
    </div>
</div>
