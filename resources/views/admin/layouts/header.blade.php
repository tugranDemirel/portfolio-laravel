<aside class="sidebar">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li>
                    <a href="{{ route('home') }}" class="">
                        <i class="material-icons">dashboard</i>
                        <span class="nav-label">Anasayfa</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span class="nav-label">Eğitim ve İş Geçmişi</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.workandschool.school') }}">Eğitim Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.workandschool.work') }}">İş Geçmişi Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.workandschool.create') }}">Eğitim - İş Geçmişi Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_list</i>
                        <span class="nav-label">Skiller</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.skills.index') }}">Skil Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.skills.create') }}">Skil Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">perm_media</i>
                        <span class="nav-label">Projeler</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.project.index') }}">Proje Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.project.create') }}">Proje Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">rss_feed</i>
                        <span class="nav-label">Bloglar</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.blog.index') }}">Blog Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blog.create') }}">Blog Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">email</i>
                        <span class="nav-label">İletişim</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.contact.index') }}">İletişim Listesi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">dvr</i>
                        <span class="nav-label">Aboneler</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.subscriber.index') }}">Abone Listesi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.setting.index') }}" class="">
                        <i class="material-icons">settings</i>
                        <span class="nav-label">Site Ayarları</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
