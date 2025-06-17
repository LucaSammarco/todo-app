<x-layouts.app.header>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden">
      <div class="layout-container flex h-full grow flex-col">
        <div class="px-4 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="@container">
              <div class="@[480px]:p-4">
                <div
                  class="flex min-h-[300px] md:min-h-[480px] flex-col gap-4 md:gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4 md:p-6"
                  style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("{{ asset('images/hero.png') }}");'
                >
                  <div class="flex flex-col gap-2 text-center px-2">
                    <h1
                      class="text-white text-2xl md:text-4xl lg:text-5xl font-black leading-tight tracking-[-0.033em]"
                    >
                      Organizza la tua giornata con Todo App
                    </h1>
                    <h2 class="text-white text-sm md:text-base font-normal leading-normal px-2 md:px-0">
                      Todo App ti aiuta a rimanere al passo con le tue attività grazie a un'interfaccia semplice e intuitiva. Gestisci le tue task in modo efficiente e raggiungi i tuoi obiettivi.
                    </h2>
                  </div>
                  <a href="{{ route('login') }}"
                    class="flex min-w-[120px] max-w-[320px] md:max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 md:h-12 md:px-5 bg-[#dce8f3] text-[#121416] text-sm md:text-base font-bold leading-normal tracking-[0.015em] mx-auto"
                  >
                    <span class="truncate">Inizia Ora</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-6 md:gap-10 px-4 py-6 md:py-10 @container" id="features">
              <div class="flex flex-col gap-4 md:gap-6">
                <div class="flex flex-col gap-3 md:gap-4">
                  <h1
                    class="text-[#121416] tracking-light text-2xl md:text-[32px] lg:text-4xl font-bold leading-tight max-w-[720px] mx-auto text-center px-2"
                  >
                    Funzionalità Principali
                  </h1>
                  <p class="text-[#121416] text-sm md:text-base font-normal leading-normal max-w-[720px] mx-auto text-center px-4">Todo App offre una gamma di funzionalità per aiutarti a gestire le tue attività in modo efficace.</p>
                </div>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-0">
                <div class="flex flex-1 gap-3 rounded-lg border border-[#dde1e3] bg-white p-4 md:p-6 flex-col min-h-[140px]">
                  <div class="text-[#121416] text-2xl md:text-3xl">
                    <i class="fas fa-tasks"></i>
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-[#121416] text-base md:text-lg font-bold leading-tight">Gestione Task</h2>
                    <p class="text-[#6a7681] text-sm md:text-base font-normal leading-normal">Crea, organizza e dai priorità alle tue attività con facilità.</p>
                  </div>
                </div>
                <div class="flex flex-1 gap-3 rounded-lg border border-[#dde1e3] bg-white p-4 md:p-6 flex-col min-h-[140px]">
                  <div class="text-[#121416] text-2xl md:text-3xl">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-[#121416] text-base md:text-lg font-bold leading-tight">Pianificazione</h2>
                    <p class="text-[#6a7681] text-sm md:text-base font-normal leading-normal">Programma le attività per date specifiche</p>
                  </div>
                </div>
                <div class="flex flex-1 gap-3 rounded-lg border border-[#dde1e3] bg-white p-4 md:p-6 flex-col min-h-[140px] md:col-span-2 lg:col-span-1">
                  <div class="text-[#121416] text-2xl md:text-3xl">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="flex flex-col gap-1">
                    <h2 class="text-[#121416] text-base md:text-lg font-bold leading-tight">Collaborazione</h2>
                    <p class="text-[#6a7681] text-sm md:text-base font-normal leading-normal">Gestione ruoli manager/dipendenti con permessi specifici per ogni utente.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="@container" id="start">
              <div class="flex flex-col justify-end gap-4 md:gap-6 px-4 py-6 md:py-10 lg:py-20">
                <div class="flex flex-col gap-2 text-center">
                  <h1
                    class="text-[#121416] tracking-light text-2xl md:text-[32px] lg:text-4xl font-bold leading-tight max-w-[720px] mx-auto px-2"
                  >
                    Pronto per Iniziare?
                  </h1>
                  <p class="text-[#6a7681] text-sm md:text-base font-normal leading-normal max-w-[720px] mx-auto px-4">
                    Registrati ora per iniziare a organizzare le tue attività in modo efficiente.
                  </p>
                </div>
                <div class="flex flex-1 justify-center">
                  <div class="flex flex-col sm:flex-row justify-center gap-3 md:gap-4 w-full max-w-md">
                    <a href="{{ route('login') }}"
                      class="flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 bg-white border border-[#dce8f3] text-[#121416] text-sm md:text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-none"
                    >
                      <span class="truncate">Accedi</span>
                    </a>
                    <a href="{{ route('register') }}"
                      class="flex min-w-[120px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 bg-[#dce8f3] text-[#121416] text-sm md:text-base font-bold leading-normal tracking-[0.015em] flex-1 sm:flex-none"
                    >
                      <span class="truncate">Registrati</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-layouts.app.header>
