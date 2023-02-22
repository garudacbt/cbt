<nav class="main-header navbar navbar-expand-md navbar-dark navbar-green border-bottom-0">
    <ul class="navbar-nav ml-2">
        <li class="nav-item">
            <?php
            $page = $this->uri->segment(1);
            if ($page !== 'dashboard') : ?>
                <a class="nav-link" href="javascript:history.back()" role="button"><i class="fas fa-arrow-left"></i></a>
            <?php endif; ?>
        </li>
    </ul>

    <div class="mx-auto text-white text-center" style="line-height: 1">
        <span class="text-lg p-0">e-Learning</span>
        <br>
        <small>Belajar kapanpun dimanapun</small>
    </div>
</nav>
