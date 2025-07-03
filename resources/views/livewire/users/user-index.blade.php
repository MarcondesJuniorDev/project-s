<div class="px-4 sm:px-6 lg:px-8">
    @if(session('message'))
        <div id="success-notification" class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200 flex justify-between items-center">
            <span>{{ session('message') }}</span>
            <a onclick="document.getElementById('success-notification').remove();">
                <flux:icon.x-mark variant="solid" class="text-green-700 dark:text-green-200 hover:text-green-900 dark:hover:text-green-400" />
            </a>
        </div>
    @endif
    @if(session('error'))
        <div id="error-notification" class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200 flex justify-between items-center">
            <span>{{ session('error') }}</span>
            <a onclick="document.getElementById('error-notification').remove();">
                <flux:icon.x-mark variant="solid" class="text-red-700 dark:text-red-200 hover:text-red-900 dark:hover:text-red-400" />
            </a>
        </div>
    @endif
    <script>
        setTimeout(() => {
            const successNotification = document.getElementById('success-notification');
            const errorNotification = document.getElementById('error-notification');
            if (successNotification) successNotification.remove();
            if (errorNotification) errorNotification.remove();
        }, 5000);
    </script>
    <div class="relative flex flex-col w-full h-full text-zinc-700 bg-white shadow-md rounded-xl bg-clip-border dark:bg-zinc-800 dark:text-zinc-300">
        <div class="relative mx-4 mt-4 overflow-hidden text-zinc-700 bg-white rounded-none bg-clip-border dark:bg-zinc-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-zinc-800 dark:text-zinc-200">
                        {{ __('Usuários') }}
                    </h3>
                    <p class="text-zinc-500 dark:text-zinc-400">
                        {{ __('Listagem de todos os usuários') }}
                    </p>
                </div>
                <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                    <input
                        type="text"
                        wire:model.debounce.500ms="search"
                        placeholder="Pesquisar usuários..."
                        class="rounded border border-zinc-300 py-2.5 px-3 text-xs font-normal text-zinc-600 focus:ring focus:ring-zinc-300 transition-all dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-300 dark:focus:ring-zinc-500"
                    />
                    <button
                        class="rounded border border-zinc-300 py-2.5 px-3 text-center text-xs font-semibold text-zinc-600 transition-all hover:opacity-75 focus:ring focus:ring-zinc-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-300 dark:focus:ring-zinc-500"
                        type="button">
                        Pesquisar
                    </button>
                    <flux:button variant="primary" href="{{ route('users.create') }}" class="mb-4 sm:mb-0">Novo Usuário</flux:button>
                </div>
            </div>
        </div>
        <div class="p-0">
            <table class="w-full mt-4 text-left table-auto min-w-max dark:bg-zinc-800">
                <thead>
                    <tr>
                        <th class="p-4 transition-colors cursor-pointer border-y border-zinc-200 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-zinc-700 dark:hover:bg-zinc-600">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-zinc-500 dark:text-zinc-300">
                                ID
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-zinc-200 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-zinc-700 dark:hover:bg-zinc-600">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-zinc-500 dark:text-zinc-300">
                                Nome
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-zinc-200 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-zinc-700 dark:hover:bg-zinc-600">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-zinc-500 dark:text-zinc-300">
                                Email
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-zinc-200 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-zinc-700 dark:hover:bg-zinc-600">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm font-normal leading-none text-zinc-500 dark:text-zinc-300">
                                Função
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-zinc-200 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-zinc-700 dark:hover:bg-zinc-600">
                            <p class="flex items-center justify-evenly gap-2 font-sans text-sm  font-normal leading-none text-zinc-500 dark:text-zinc-300">
                                Ações
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="dark:bg-zinc-700 dark:border-zinc-600">
                            <td class="p-4 border-b border-zinc-200 dark:border-zinc-600">
                                <div class="flex items-center gap-3">
                                    <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg" alt="John Michael" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                    <div class="flex flex-col">
                                        <p class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">
                                            {{ $user->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-zinc-200 dark:border-zinc-600">
                                <div class="flex flex-col">
                                    <p class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">
                                        {{ $user->name }}
                                    </p>
                                </div>
                            </td>       
                            <td class="p-4 border-b border-zinc-200 dark:border-zinc-600">
                                <p class="text-sm text-zinc-500 dark:text-zinc-400">
                                {{ $user->email }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-zinc-200 dark:border-zinc-600">
                                <flux:badge variant="pill" color="green">
                                    {{ $user->role ?? 'Usuário' }}
                                </flux:badge>
                            </td>
                            <td class="p-4 border-b border-zinc-200 dark:border-zinc-600">
                                <div class="flex justify-evenly">
                                    <a href="{{ route('users.show', $user->id) }}">
                                        <flux:icon.eye variant="solid" class="hover:text-cyan-600 dark:hover:text-cyan-400" />
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}">
                                        <flux:icon.pencil variant="solid" class="hover:text-amber-600 dark:hover:text-amber-400" />
                                    </a>
                                    <a wire:click="delete({{ $user->id }})" wire:confirm="Tem certeza que deseja excluir este usuário?">
                                        <flux:icon.trash variant="solid" class="hover:text-red-600 dark:hover:text-red-400" />
                                    </a>
                                </div>
                                
                            </td>
                        </tr> 
                    @endforeach          
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between p-3">
            <p class="block text-sm text-zinc-500 dark:text-zinc-400">
                Page 1 of 10
            </p>
            <div class="flex gap-1">
                <button class="rounded border border-zinc-300 py-2.5 px-3 text-center text-xs font-semibold text-zinc-600 transition-all hover:opacity-75 focus:ring focus:ring-zinc-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-300 dark:focus:ring-zinc-500" type="button">
                    Previous
                </button>
                <button class="rounded border border-zinc-300 py-2.5 px-3 text-center text-xs font-semibold text-zinc-600 transition-all hover:opacity-75 focus:ring focus:ring-zinc-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none dark:border-zinc-600 dark:bg-zinc-700 dark:text-zinc-300 dark:focus:ring-zinc-500" type="button">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>



