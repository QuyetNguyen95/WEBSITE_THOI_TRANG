<div class="t-header-content-wrapper">
    <div class="t-header-content">
      <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
        <i class="mdi mdi-menu"></i>
      </button>
      <ul class="nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="messageDropdown" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-message-outline mdi-1x"></i>
              @if ($data['countContact'] > 0)
              <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"
              style="position: absolute;top: 12px;right: 90px;"></span>
              @endif
              <span style="color: #525c5d;font-size: 15px;">Thông báo</span>
            </a>
            <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="messageDropdown">
              <div class="dropdown-header">
                <h6 class="dropdown-title">Liên hệ mới nhất</h6>
                <p class="dropdown-title-text">Bạn có {{$data['countContact']}} liên hệ mới</p>
              </div>
              <div class="dropdown-body">
                @foreach ($data['newContacts'] as $newContact)
                <div class="dropdown-list">
                <div class="content-wrapper">
                    <small class="name" style="line-height:20px">{{$newContact->c_name}}</small>
                    <small class="content-text" style="display: block">{{$newContact->c_title}}</small>
                </div>
                </div>
                @endforeach
              </div>
              <div class="dropdown-footer">
                <a href="{{route('admin.get.list.contact')}}">Chi tiết</a>
              </div>
            </div>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-account mdi-1x"></i>
             @if (Auth::guard('admins')->user()->role == 1)
                <span style="color: #525c5d;font-size: 15px;">Quản lý</span>
             @else
                <span style="color: #525c5d;font-size: 15px;">Nhân viên</span>
             @endif
          </a>
          <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
            <div class="dropdown-header">
              <h6 class="dropdown-title">Admin</h6>
            </div>
            <div class="dropdown-body">
              <div class="dropdown-list">
                <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">
                  <i class="mdi mdi-account-card-details"></i>
                </div>
                <div class="content-wrapper">
                  <small class="name" style="line-height:20px"><a href="{{route('get.info.admin')}}">Thông tin</a></small>
                </div>
              </div>
              @if (Auth::guard('admins')->user()->role == 1)
              <div class="dropdown-list">
                <div class="icon-wrapper rounded-circle bg-inverse-success text-success">
                  <i class="mdi mdi-account-plus"></i>
                </div>
                <div class="content-wrapper">
                  <small class="name" style="line-height:20px"><a href="{{route('get.add.staff')}}">Thêm nhân viên</a></small>
                </div>
              </div>
              @endif
              <div class="dropdown-list">
                <div class="icon-wrapper rounded-circle bg-inverse-danger text-danger">
                  <i class="mdi mdi-logout"></i>
                </div>
                <div class="content-wrapper">
                  <small class="name" style="line-height:20px"><a href="{{route('get.admin.logout')}}">Đăng xuất</a></small>
                </div>
              </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>

