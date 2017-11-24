<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/8/2017
 * Time: 10:01 PM
 */
?>

<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->
    <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
    </div>
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item <?php activePage('Dashboard', $page); ?>"><a href="../admin/dashboard.php"><i
                            class="icon-home3"></i><span class="menu-title">Dashboard</span><span
                            class="tag tag tag-primary tag-pill float-xs-right mr-2">2</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-plane"></i><span data-i18n="nav.page_layouts.main"
                                                                              class="menu-title">Airwaybill</span></a>
                <ul class="menu-content">
                    <li class="<?php activePage('Add bill', $page); ?>"><a href="../admin/addbill.php"
                                                                           class="menu-item">Add Airwaybill</a>
                    </li>
                    <li class="<?php activePage('Airway Bills', $page); ?>"><a href="../admin/airwaybill.php"
                                                                               data-i18n="nav.page_layouts.2_columns"
                                                                               class="menu-item ">Airwaybill List</a>
                    </li>
                    <li class="<?php activePage('Bill Status', $page); ?>"><a href="../admin/billstatus.php"
                                                                              class="menu-item">Bill Status</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-briefcase2"></i><span data-i18n="nav.project.main"
                                                                                   class="menu-title">Shipment</span></a>
                <ul class="menu-content">
                    <li class="<?php activePage('Add Shipment', $page); ?>"><a href="../admin/addshipment.php"
                                                                               class="menu-item">Add Shipment</a>
                    </li>
                    <li class="<?php activePage('Shipments', $page); ?>"><a href="../admin/shipment.php"
                                                                            class="menu-item">Shipment List</a>
                    </li>
                    <li><a href="search-page.html" data-i18n="nav.search_pages.search_page" class="menu-item">Shipment
                            Status</a>
                    </li>
                    <li class="<?php activePage('Container Prefixes', $page); ?>"><a href="../admin/prefixes.php"
                                                                                     class="menu-item">Container
                            Prefixes</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.cards.main"
                                                                                class="menu-title">Modules</span></a>
                <ul class="menu-content">
                    <li><a href="card-bootstrap.html" data-i18n="nav.cards.card_bootstrap" class="menu-item">Bootstrap
                            Cards</a>
                    </li>
                    <li><a href="card-actions.html" data-i18n="nav.cards.card_actions" class="menu-item">Card Action</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-whatshot"></i><span data-i18n="nav.advance_cards.main"
                                                                                 class="menu-title">Utility</span></a>
                <ul class="menu-content">
                    <li><a href="card-statistics.html" data-i18n="nav.cards.card_statistics" class="menu-item">Statistics</a>
                    </li>
                    <li><a href="card-charts.html" data-i18n="nav.cards.card_charts" class="menu-item">Charts</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-compass3"></i><span data-i18n="nav.content.main"
                                                                                 class="menu-title">Billing</span></a>
                <ul class="menu-content">
                    <li><a href="content-grid.html" data-i18n="nav.content.content_grid" class="menu-item">Grid</a>
                    </li>
                    <li><a href="content-typography.html" data-i18n="nav.content.content_typography" class="menu-item">Typography</a>
                    </li>
                    <li><a href="content-text-utilities.html" data-i18n="nav.content.content_text_utilities"
                           class="menu-item">Text utilities</a>
                    </li>
                    <li><a href="content-helper-classes.html" data-i18n="nav.content.content_helper_classes"
                           class="menu-item">Helper classes</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-gear"></i><span data-i18n="nav.components.main"
                                                                             class="menu-title">Setup</span></a>
                <ul class="menu-content">
                    <li><a href="component-alerts.html" data-i18n="nav.components.component_alerts" class="menu-item">Global
                            Settings</a>
                    </li>
                    <li class="<?php activePage('Users', $page); ?>"><a href="../admin/users.php" class="menu-item">User
                            manager</a>
                    </li>
                    <li><a href="component-carousel.html" data-i18n="nav.components.component_carousel"
                           class="menu-item">Email manager</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>
<!-- / main menu-->
