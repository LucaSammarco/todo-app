<x-layouts.app.header>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden">
      <div class="layout-container flex h-full grow flex-col">
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="@container">
              <div class="@[480px]:p-4">
                <div
                  class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4"
                  style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBj0RHabB3fsNMmhnM41IutG3fqMkcz7gT-zVM8mD64ShwetU7-3Qd6EkutHZ9cKqoCgvRMVBddOlBefi-ae5ADadpZzESmVhlzQXqIlN4LdasGBunr0eh5BYlKRzxk0pM9dxXuF2ZcVEPSPirjses8-xpqiP3Gju2_OIgAKZZ1drjTB2bM-Fko0qtnwI2kNSs9p3HxIqaWkrHSvDACFcENZD7HTvKv4QuN7v7ds_BixG1D-cTcK-qGzjB-3bYy6bXqZrVMKZJJu8B1");'
                >
                  <div class="flex flex-col gap-2 text-center">
                    <h1
                      class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]"
                    >
                      Organizza la tua giornata con Todo App
                    </h1>
                    <h2 class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                      Todo App ti aiuta a rimanere al passo con le tue attività grazie a un'interfaccia semplice e intuitiva. Gestisci le tue task in modo efficiente e raggiungi i tuoi obiettivi.
                    </h2>
                  </div>
                  @auth
                    <a href="{{ route('dashboard') }}"
                      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                    >
                      <span class="truncate">Vai alla Dashboard</span>
                    </a>
                  @else
                    <a href="{{ route('login') }}"
                      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                    >
                      <span class="truncate">Inizia Ora</span>
                    </a>
                  @endauth
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-10 px-4 py-10 @container" id="features">
              <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-4">
                  <h1
                    class="text-[#121416] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px] mx-auto text-center"
                  >
                    Funzionalità Principali
                  </h1>
                  <p class="text-[#121416] text-base font-normal leading-normal max-w-[720px] mx-auto text-center">Todo App offre una gamma di funzionalità per aiutarti a gestire le tue attività in modo efficace.</p>
                </div>
                @auth
                  <a href="{{ route('dashboard') }}"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] w-fit"
                  >
                    <span class="truncate">Vai alla Dashboard</span>
                  </a>
                @else


                  </a>
                @endauth
              </div>
              <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-0">
                <div class="flex flex-1 gap-3 rounded-lg border border-[#dde1e3] bg-white p-4 flex-col">
                  <div class="text-[#121416] text-2xl">
                    <i class="fas fa-tasks"></i>
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-[#121416] text-base font-bold leading-tight">Gestione Task</h2>
                    <p class="text-[#6a7681] text-sm font-normal leading-normal">Crea, organizza e dai priorità alle tue attività con facilità.</p>
                  </div>
                </div>
                <div class="flex flex-1 gap-3 rounded-lg border border-[#dde1e3] bg-white p-4 flex-col">
                  <div class="text-[#121416] text-2xl">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-[#121416] text-base font-bold leading-tight">Pianificazione</h2>
                    <p class="text-[#6a7681] text-sm font-normal leading-normal">Programma le attività per date specifiche</p>
                  </div>
                </div>
                <div class="flex flex-1 gap-3 rounded-lg border border-[#dde1e3] bg-white p-4 flex-col">
                  <div class="text-[#121416] text-2xl">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-[#121416] text-base font-bold leading-tight">Collaborazione</h2>
                    <p class="text-[#6a7681] text-sm font-normal leading-normal">Gestione ruoli manager/dipendenti con permessi specifici per ogni utente.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="@container" id="start">
              <div class="flex flex-col justify-end gap-6 px-4 py-10 @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20">
                <div class="flex flex-col gap-2 text-center">
                  <h1
                    class="text-[#121416] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px] mx-auto"
                  >
                    Pronto per Iniziare?
                  </h1>
                  <p class="text-[#6a7681] text-base font-normal leading-normal max-w-[720px] mx-auto">
                    @auth
                      Benvenuto {{ auth()->user()->name }}! Sei pronto a gestire le tue attività.
                    @else
                      Registrati ora per iniziare a organizzare le tue attività in modo efficiente.
                    @endauth
                  </p>
                </div>
                <div class="flex flex-1 justify-center">
                  <div class="flex justify-center gap-4">
                    @auth
                      <a href="{{ route('dashboard') }}"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] grow"
                      >
                        <span class="truncate">Vai alla Dashboard</span>
                      </a>
                    @else
                      <a href="{{ route('login') }}"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-white border border-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                      >
                        <span class="truncate">Accedi</span>
                      </a>
                      <a href="{{ route('register') }}"
                        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#dce8f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                      >
                        <span class="truncate">Registrati</span>
                      </a>
                    @endauth
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-layouts.app.header>
