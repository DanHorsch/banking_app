<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand mr-auto" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="dropdown-menu-row">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT. "/branches"; ?>">Branches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT. "/customers"; ?>">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT. "/reports"; ?>">Reports</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
