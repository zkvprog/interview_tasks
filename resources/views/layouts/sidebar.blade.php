<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('task1') ? 'active' : '' }}" aria-current="page" href="/task1">
                    Task 1
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('task2') ? 'active' : '' }}" href="/task2">
                    Task 2
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('task3') ? 'active' : '' }}" href="/task3">
                    Task 3
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('task4') ? 'active' : '' }}" href="/task4">
                    Task 4
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('task5') ? 'active' : '' }}" href="/task5">
                    Task 5
                </a>
            </li>
        </ul>
    </div>
</nav>
