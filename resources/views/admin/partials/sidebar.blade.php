<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#property-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-houses"></i><span>Property Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="property-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('list.property')}}">
                    <i class="bi bi-circle"></i><span>Property</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pdf.export')}}">
                    <i class="bi bi-circle"></i><span>PDF Extract</span>
                </a>
            </li>
        </ul>
      </li><!-- Enquiry Management -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#enquiry-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Enquiry Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="enquiry-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('list.enquiry')}}">
                  <i class="bi bi-circle"></i><span>Enquiry</span>
                </a>
              </li>
              <li>
                <a href="{{ route('list.quotation')}}">
                  <i class="bi bi-circle"></i><span>Quotation</span>
                </a>
              </li>
        </ul>
      </li><!-- Enquiry Management -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('role.list')}}">
                  <i class="bi bi-circle"></i><span>Role Management</span>
                </a>
              </li>
              <li>
                <a href="{{ route('permission.list')}}">
                  <i class="bi bi-circle"></i><span>Permission Management</span>
                </a>
              </li>
              <li>
                <a href="{{ route('users.list')}}">
                  <i class="bi bi-circle"></i><span>User Management</span>
                </a>
              </li>
        </ul>
      </li><!-- End Settings Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#master-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gear-wide-connected"></i><span>Master Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('create.generalSetting')}}">
                  <i class="bi bi-circle"></i><span>General Settings</span>
                </a>
              </li>
              <li>
                <a href="{{ route('state.index')}}">
                  <i class="bi bi-circle"></i><span>State Management</span>
                </a>
              </li>
              <li>
                <a href="{{ route('category.index')}}">
                    <i class="bi bi-circle"></i><span>Category Management</span>
                  </a>
              </li>
              <li>
                <a href="{{ route('contract.index')}}">
                    <i class="bi bi-circle"></i><span>Contract Type Management</span>
                  </a>
              </li>
              <li>
                <a href="{{ route('design.index')}}">
                    <i class="bi bi-circle"></i><span>Design Management</span>
                  </a>
              </li>
        </ul>
      </li><!-- End Master Setting -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('page.index')}}">
          <i class="bi bi-file-earmark"></i>
          <span>CMS Pages</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('faq.index')}}">
            <i class="bi bi-question-circle"></i>
          <span>FAQ</span>
        </a>
      </li><!-- End Dashboard Nav -->

    </ul>

  </aside><!-- End Sidebar-->
