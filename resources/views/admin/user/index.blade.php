@extends('admin.layouts.index')
 
@section('title', 'Page Title')

@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Người dùng</span>
            </div>
        </li>
    </ol>
</nav>

@if($errors->any())
<ul>
    @foreach( $errors->all() as $error)
    <li>
        <span class="text-red-300">{{$error}}</span>
    </li>
    @endforeach
</ul>
@endif

<section class="bg-gray-50 dark:bg-gray-900 py-4 sm:py-5 mt-5">
        <div class="px-4 mx-auto max-w-screen-2xl">
            <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h2 class="text-black text-2xl font-semibold">Danh sách người dùng</h2>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <button data-modal-target="create-modal" data-modal-toggle="create-modal" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Thêm người dùng mới
                        </button>
                        <!-- Create main modal -->
                        <div id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Create modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Create modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            Tạo người dùng mới
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="create-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Create modal body -->
                                    <form data-route="{{ route('admin.user.store') }}" method="POST" class="p-4 md:p-5">
                                        @csrf
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tên người dùng</label>
                                                <input type="text" name="name" id="new-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập tên người dùng ..." required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                <input type="email" name="email" id="new-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" placeholder="Nhập email người dùng ..." required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Số điện thoại</label>
                                                <input type="text" name="phone" id="new-phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" placeholder="Nhập sdt người dùng ..." required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mật khẩu</label>
                                                <input type="password" name="password" id="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" placeholder="Nhập mật khẩu ..." required="">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn_create_item text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Tạo người dùng mới
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        <!-- <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            Xuất dữ liệu
                        </button> -->
                    </div>
                </div>
                <!-- --------- -->
                <div class="overflow-x-auto pb-20">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <!-- <th scope="col" class="px-4 py-3">ID</th> -->
                                <th scope="col" class="px-4 py-3">Tên</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Số điện thoại</th>
                                <th scope="col" class="px-4 py-3">Vai trò</th>
                                <th scope="col" class="px-4 py-3">Quyền</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->name }}</th>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">{{ $user->phone }}</td>
                                <td class="px-4 py-3">
                                    <?php
                                        $roles = $user->getRoleNames();
                                    ?>
                                    @foreach($roles as $role)
                                        <span class="px-2 py-1 text-white text-xs rounded bg-green-600">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td class="px-4 py-3"></td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-4">
                                        <button data-modal-target="edit-modal-{{$user->id}}" data-modal-toggle="edit-modal-{{$user->id}}" class="block">
                                            <svg class="fill-yellow-300 hover:fill-yellow-600" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                            </svg>
                                        </button>
                                        
                                        <!-- Create main modal -->
                                        <div id="edit-modal-{{$user->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Create modal content -->
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <!-- Create modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                        <h3 class="text-lg font-semibold text-gray-900">
                                                            Cập nhật người dùng : {{ $user->name }}
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal-{{$user->id}}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Create modal body -->
                                                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="p-4 md:p-5">
                                                        @csrf
                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                            <div class="col-span-2">
                                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tên người dùng</label>
                                                                <input type="text" name="name" id="update-name-{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ $user->name }}">
                                                            </div>
                                                            <div class="col-span-2">
                                                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Số điện thoại</label>
                                                                <input type="text" name="phone" id="update-phone-{{$user->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" value="{{ $user->phone }}">
                                                            </div>
                                                            <!-- <div class="col-span-2">
                                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" value="{{ $user->email }}">
                                                            </div>
                                                            <div class="col-span-2">
                                                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mật khẩu</label>
                                                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.50" placeholder="Nhập mật khẩu ..." required="">
                                                            </div> -->
                                                        </div>
                                                        <button type="submit" data-id="{{ $user->id }}" class="btn_update_item text-white inline-flex items-center bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                                            </svg>
                                                            Cập nhật
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- hahahahahhah -->
                                        <button type="submit" data-id="{{ $user->id }}" class="btn_delete_item text-left block text-base">
                                            <svg class="fill-red-300 hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                                <path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
        </div>
    </section>
    
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn_create_item').click(function(e){
                e.preventDefault();

                var createButton = $(this);
                var dataNewUser = {
                    name: $('#new-name').val(),
                    email: $('#new-email').val(),
                    phone: $('#new-phone').val(),
                    password: $('#new-password').val(),                   
                };

                $.ajax({
                    type: 'POST',
                    url: createButton.data('route'),
                    data: dataNewUser,
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 1500,
                           
                        });
                        
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    },
                    error: function(results) {
                        var errors = "";

                        $.each(results.responseJSON.errors, function(key, error)
                        {
                            errors += "<li>"+error+"</li>"
                        });
                   
                        Swal.fire({
                            title: "Lỗi !",
                            html: "<ul>"
                            +"<li>"+errors+"</li>"
                            +"</ul>",
                            icon: "error",
                        }); 

                    },
                });
            });

            $('.btn_update_item').click(function(e){
                e.preventDefault();

                var updateButton = $(this);
                var id = updateButton.data("id");
                var dataUserUpdate = {
                    name: $('#update-name-'+id).val(),
                    // email: $('#new-email').val(),
                    phone: $('#update-phone-'+id).val(),
                    // password: $('#new-password').val(),                   
                };

                $.ajax({
                    type: 'POST',
                    url: "user/edit/"+id,
                    data: dataUserUpdate,
                    success: function(results) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: results,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        
                        setTimeout(function(){
                            location.reload();
                        },2000);
                    },
                    error: function(results) {
                        var errors = "";

                        $.each(results.responseJSON.errors, function(key, error)
                        {
                            errors += "<li>"+error+"</li>"
                        });
                   
                        Swal.fire({
                            title: "Lỗi !",
                            html: "<ul>"
                            +"<li>"+errors+"</li>"
                            +"</ul>",
                            icon: "error",
                        }); 

                    },
                });
            });

            $('.btn_delete_item').click(function(e){
                e.preventDefault();

                var id = $(this).data("id");

                Swal.fire({
                    title: "Bạn có chắc chắn muốn xóa ?",
                    text: "Bạn sẽ không thể hoàn nguyên điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa thông tin",
                    cancelButtonText: "Quay lại"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: "user/delete/"+id,
                            data: {
                                "id": id,
                            },
                            success: function(results) {
                                Swal.fire({
                                    title: "Xóa thành công !",
                                    text: "Thông tin đã được xóa !",
                                    icon: "success"
                                });
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            },
                            error: function(results) {
                                Swal.fire({
                                    title: "Không thể xóa !",
                                    text: "Có diều gì đó đã xảy ra !",
                                    icon: "error"
                                });
                            },
                        });
                        
                    } 
                    // else {
                    //     Swal.fire("Error!", results.message, "error");
                    // }
                });
            });
        });
    </script>
@endsection