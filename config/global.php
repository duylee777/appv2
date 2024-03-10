<?php
    return [
        'default_roles' => [
            'super_admin' => "Quản trị viên cấp cao",
            'admin' => "Quản trị viên",
            'staff' => "Nhân viên",
            'customer' => "Khách hàng"
        ],

        'role_permissions' => [
            'view_roles' => "Xem danh sách vai trò",
            'create_role' => "Thêm mới vai trò",
            'update_role' => "Cập nhật vai trò",
            'delete_role' => "Xóa vai trò",
        ],

        'user_permissions' => [
            'view_users' => "Xem danh sách người dùng",
            'create_user' => "Thêm mới người dùng",
            'update_user' => "Cập nhật người dùng",
            'delete_user' => "Xóa người dùng",
        ],

        'category_permissions' => [
            'view_categories' => "Xem danh sách danh mục",
            'create_category' => "Thêm mới danh mục",
            'update_category' => "Cập nhật danh mục",
            'delete_category' => "Xóa danh mục",
        ],
    ];
?>