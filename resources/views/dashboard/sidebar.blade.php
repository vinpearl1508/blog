<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">Dashboard</li>
            <li>
                <router-link :to="{name: 'categories.list'}" class="fa fa-sitemap">
                    <span> Category</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{name: 'posts.list'}" class="fa fa-book">
                    <span> Post</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{name: 'posts.draft'}" class="fa fa-bookmark">
                    <span> Draft</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{name: 'users.list'}" class="fa fa-users">
                    <span> User</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{}" class="fa fa-rocket">
                    <span> Role</span>
                </router-link>
            </li>
            <li>
                <router-link :to="{}" class="fa fa-server">
                    <span> Permission</span>
                </router-link>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
