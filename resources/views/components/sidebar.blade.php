<div class="p-4 flex items-center justify-between border-b border-indigo-600 text-3xl lg:text-sm">
    <div class="flex items-center">
        <i id="wallet" class="fas fa-computer text-2xl mr-3 text-3xl lg:text-sm" style="display=none"></i>
        <span class="nav-text logo-text text-xl font-bold hidden">GestMaq</span>
    </div>
    <button onclick="toggleSidebar()" class="expand-icon text-white focus:outline-none hidden lg:block">
        <i class="fas fa-chevron-left"></i>
    </button>

    <button onclick="toggleSidebarMobile()" class="lg:hidden text-white p-2">
        <i class="fas fa-times"></i>
    </button> 
</div>
<nav class="flex-1 overflow-y-auto py-4 text-3xl lg:text-sm">
    <ul>
        <li class="mb-1">
            <a href="{{route('dashboard')}}" class="flex items-center px-4 py-3 text-white hover:bg-indigo-600 transition nav-item active" >
                <i class="fas fa-chart-pie mr-3"></i>
                <span class="nav-text hidden text-base">Dashboard</span>
            </a>
            <a href="{{route('maquina')}}" class="flex items-center px-4 py-3 text-white hover:bg-indigo-600 transition nav-item active" >
                <i class="fas fa-desktop mr-3"></i>
                <span class="nav-text hidden text-base">Máquinas</span>
            </a>
           <a href="{{ route('departamento') }}" 
            class="flex items-center px-4 py-3 text-white hover:bg-indigo-600 transition nav-item active">
                <i class="fas fa-building mr-3"></i>
                <span class="nav-text hidden text-base">Departamento</span>
            </a>

            <a href="{{ route('colaborador') }}" 
            class="flex items-center px-4 py-3 text-white hover:bg-indigo-600 transition nav-item active">
                <i class="fas fa-user mr-3"></i>
                <span class="nav-text hidden text-base">Colaborador</span>
            </a>
        </li>
    </ul>
</nav>