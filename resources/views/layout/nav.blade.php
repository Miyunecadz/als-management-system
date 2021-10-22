<nav class="nav-height bg-green-light-flat border-bottom border-success shadow-sm
            d-flex flex-row pt-1 overflow-hidden">
    <div class="btn p-0 border-0 mx-2" style="font-size:30px" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </div>

    <form action="" method="GET" class="mx-2">
        @csrf
        <div class="input-icons">
            <i class="bi bi-search icon"></i>
            <input type="text" name="search"
                   class="input-field font-poppins-regular
                            border-0 rounded-pill search-input"
                   required placeholder="Search....">
        </div>
    </form>
</nav>
