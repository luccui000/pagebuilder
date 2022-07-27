<div class="sidebar" id="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 460px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 460px;">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li @if(request()->segment(2) == 'menus') class="active" @endif>
                        <a href="/admin/menus"><i class="fa fa-bars"></i> <span>Menus</span></a>
                    </li>
                    <li>
                        <a href="/admin/hinh-anh"><i class="fa fa-image"></i> <span>Hình ảnh</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="fa fa-rocket"></i>
                            <span>Giao diện</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li>
                                <a href="/admin/trang">Danh sách trang</a>
                            </li>
                            <li>
                                <a href="#">Tạo trang mới</a>
                            </li>
                            <li><a href="#">Nội dung trang</a></li>
                            <li><a href="/admin/footer">Footer</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="fa fa-sitemap"></i>
                            <span>Nội dung</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="/admin/slider">Sliders</a></li>
                            <li><a href="/admin/card">Cards</a></li>
                            <li><a href="#">Google map</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span>Người dùng</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cog"></i> <span>Cài đặt</span></a>
                    </li>
                </ul>
            </div>
        </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 170.096px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
</div>
