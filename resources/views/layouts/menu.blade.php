<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu tree" data-widget="tree">
    <li class="header">Menú Principal</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-gears"></i> <span>Hilos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= url('materiales/index') ?>"><i class="fa fa-circle-o"></i> Lista Materiales</a></li>
            <li><a href="<?= url('hilos/index') ?>"><i class="fa fa-circle-o"></i> Lista Calibre Hilo</a></li>
            <li><a href="<?= url('composicionhilo/index') ?>"><i class="fa fa-circle-o"></i> Lista Composición Hilo</a></li>
            <li><a href="<?= url('texturas/index') ?>"><i class="fa fa-circle-o"></i> Lista Textura Color</a></li>
            <li><a href="<?= url('tejidos/index') ?>"><i class="fa fa-circle-o"></i> Lista de Tejidos</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cart-plus"></i> <span>Proveedores</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= url('proveedores/index') ?>"><i class="fa fa-circle-o"></i> Lista Proveedores</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i> <span>Clientes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?= url('clientes/index') ?>"><i class="fa fa-circle-o"></i> Lista Clientes</a></li>
        </ul>
    </li>
</ul>