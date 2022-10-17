<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="<?= $this->Url->Build(['controller' => 'dashboard']) ?>" class="brand-link text-start">
        <h3 class="brand-text font-weight-bold">แม่ปลูกลูกขาย</h3>
    </a>

    <div class="sidebar">
        <div class="mt-3 pb-1 mb-2 d-flex m-0 p-0">
            <div class="image">
                <!-- <img src="https://images.unsplash.com/photo-1665238076980-47731fc833b2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=Format&fit=crop&w=687&q=80" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block text-white text-uppercase">
                    <small> <?= $userData->name ?></small>
                </a>
                <small class="text-secondary"><?= $userData->usersrole['ur_name'] ?></small>
            </div>
        </div>
        <div class="Form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="Form-control Form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-secondary text-uppercase"><small>Management space</small></li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'dashboard', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-database"></i>
                        <p class="text-bold text-uppercase">
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'posts', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <p class="text-bold text-uppercase">
                            Posts

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'products', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fab fa-product-hunt"></i>
                        <p class="text-bold text-uppercase">
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'chats', 'action' => 'index']) ?>" class="nav-link">
                        <i class="far fa-comments"></i>
                        <p class="text-bold text-uppercase">
                            Chat
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'chats', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p class="text-bold text-uppercase">
                            Order
                        </p>
                    </a>
                </li>
                <li class="nav-header text-secondary text-uppercase"><small>System Area</small></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                        <p class="text-bold text-uppercase">
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'users', 'action' => 'index']) ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'chats', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-address-card"></i>
                        <p class="text-bold text-uppercase">
                            Contact Links
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'chats', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-info-circle"></i>
                        <p class="text-bold text-uppercase">
                            Logging Report
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'users', 'action' => 'logout']) ?>" class="nav-link">
                        <i class="fas fa-sign-out"></i>
                        <p class="text-bold text-uppercase">
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>