<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{route('admin.dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{route('employee.index')}}" class="menu-link">
          <i class="fa-solid fa-user-group"></i>
          <div data-i18n="Basic">Employee</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('supplier.index')}}" class="menu-link">
          <i class="fa-solid fa-user-group"></i>
          <div data-i18n="Basic">Supplier</div>
        </a>
      </li>

    </ul>
  </aside>
