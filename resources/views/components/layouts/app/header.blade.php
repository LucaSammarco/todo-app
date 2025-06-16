<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="bg-gradient-to-r from-blue-600 to-purple-600 dark:bg-gradient-to-r dark:from-blue-800 dark:to-purple-800 h-16 shadow-lg">
            <div class="flex items-center justify-between w-full h-full">
                <div class="flex items-center">
                    <flux:sidebar.toggle class="lg:hidden mr-2" icon="bars-2" inset="left" />

                    @auth
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" wire:navigate>
                            <x-app-logo />
                        </a>
                    @else
                        <a href="{{ route('home') }}" class="flex items-center space-x-2" wire:navigate>
                            <x-app-logo />
                        </a>
                    @endauth
                </div>

                <div class="flex items-center space-x-4">
                    <flux:navbar class="space-x-0.5 [&_svg]:text-gray-900 [&_button]:text-gray-900">
                        <flux:tooltip content="Repository GitHub" position="bottom">
                            <flux:navbar.item
                                class="h-10 max-lg:hidden [&>div>svg]:size-5 text-gray-900 hover:text-gray-700"
                                icon="folder-git-2"
                                href="https://github.com/LucaSammarco/todo-app"
                                target="_blank"
                                label="Repository"
                            />
                        </flux:tooltip>
                    </flux:navbar>

                    @auth
                        <!-- Desktop User Menu -->
                        <flux:dropdown position="top" align="end">
                            <flux:profile
                                class="cursor-pointer text-gray-900 [&_span]:bg-gray-900 [&_span]:text-white"
                                :initials="auth()->user()->initials()"
                            />

                            <flux:menu>
                                <flux:menu.radio.group>
                                    <div class="p-0 text-sm font-normal">
                                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                                <span
                                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                                >
                                                    {{ auth()->user()->initials() }}
                                                </span>
                                            </span>

                                            <div class="grid flex-1 text-start text-sm leading-tight">
                                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </flux:menu.radio.group>

                                <flux:menu.separator />

                                <flux:menu.radio.group>
                                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                                </flux:menu.radio.group>

                                <flux:menu.separator />

                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                        {{ __('Log Out') }}
                                    </flux:menu.item>
                                </form>
                            </flux:menu>
                        </flux:dropdown>
                    @else
                        <!-- Auth buttons for guests -->
                        <div class="flex items-center space-x-2">
                            <flux:navbar.item :href="route('login')" wire:navigate class="flex items-center space-x-2">

                                <span>Accedi</span>
                            </flux:navbar.item>
                            <flux:navbar.item variant="filled" :href="route('register')" wire:navigate class="flex items-center space-x-2">

                                <span>Registrati</span>
                            </flux:navbar.item>
                        </div>
                    @endauth
                </div>
            </div>
        </flux:header>

        <!-- Mobile Menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            @auth
                <a href="{{ route('dashboard') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                    <x-app-logo />
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group heading="Navigazione">
                        <flux:navlist.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        Tasks
                        </flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>
            @else
                <a href="{{ route('home') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                    <x-app-logo />
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group heading="Autenticazione">
                        <flux:navlist.item icon="arrow-right-end-on-rectangle" :href="route('login')" wire:navigate>
                        Accedi
                        </flux:navlist.item>
                        <flux:navlist.item icon="user-plus" :href="route('register')" wire:navigate>
                        Registrati
                        </flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist>
            @endauth

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/LucaSammarco/todo-app" target="_blank">
                    Repository
                </flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
