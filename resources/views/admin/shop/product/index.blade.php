@extends('admin.layouts.index')
@section('title', 'Sản phẩm')
@section('content')

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Sản phẩm</span>
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

<section class="bg-gray-50 py-4 sm:py-5 mt-5">
    <div class="px-4 mx-auto max-w-screen-2xl">
        <div class="relative overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                <div class="flex items-center flex-1 space-x-4">
                    <h2 class="text-black text-2xl font-semibold">Danh sách sản phẩm</h2>
                </div>

                <!-- Search form -->
                <div class="flex-1">
                    <div class="flex items-center max-w-lg mx-auto">   
                        <div class="relative w-full"> 
                            <input type="text" id="product-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5" placeholder="Search Product Code ..." required />
                            <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                <svg class="w-4 h-4 me-2 text-blue-500 hover:text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3"> 
                    <!-- Create main modal -->
                    <a href="{{ route('product.create') }}" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Thêm sản phẩm mới
                    </a>
                </div>
            </div>
            <!-- --------- -->
            <div class="overflow-x-auto pb-20">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <!-- <th scope="col" class="px-4 py-3">
                                <input id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            </th> -->
                            <th scope="col" class="px-4 py-3"></th>
                            <th scope="col" class="px-4 py-3">Mã sản phẩm</th>
                            <th scope="col" class="px-4 py-3">Tên sản phẩm</th>
                            <th scope="col" class="px-4 py-3">Danh mục</th>
                            <th scope="col" class="px-4 py-3">Hiển thị</th>
                            <th scope="col" class="px-4 py-3">Nổi bật</th>
                            <th scope="col" class="px-4 py-3">Số lượng</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="product-item border-b">
                            <!-- <td class="px-4 py-3">
                                <input id="checkbox-product-{{$product->id}}" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            </td> -->
                            <td class="px-4 py-3">
                                <div class="w-24 h-24 overflow-hidden flex items-center justify-center rounded-md shadow">
                                    <img id="" class="w-full" src="{{asset('../storage/products/'.$product->code.'/thumbnails/'.$product->code.'.webp')}}" alt="Extra large image">
                                </div>
                            </td>
                            <td class="product-code px-4 py-3">{{ $product->code }}</td>
                            <td class="product-name px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->category->name }}</td>
                            <td class="px-4 py-3">
                                @if($product->is_active)
                                    <svg class="fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                    </svg>
                                @else
                                    <svg class="fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($product->is_featured)
                                    <svg class="fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/>
                                    </svg>
                                @else
                                    <svg class="fill-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16" width="16">
                                        <path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $product->inventory->quantity }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-end gap-4">
                                    <!-- Update category -->
                                    <a href="{{ route('product.edit', $product->id) }}" class="block">
                                        <svg class="fill-yellow-300 hover:fill-yellow-600" xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                        </svg>
                                    </a>
                                
                                    <!-- Delete category -->
                                    <form method="POST" action="{{ route('product.destroy', $product->id) }}" data-id="{{ $product->id }}" class="btn_delete_item text-left block text-base cursor-pointer">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left block text-base" onclick="return confirm('Bạn chắc chắn muốn xóa ?')">
                                            <svg class="fill-red-300 hover:fill-red-600" xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                                <path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</section>

<script>
    let row = document.querySelectorAll('.product-item');
    let searchInput = document.getElementById('product-search');

    let code = document.querySelectorAll('.product-code');
    let name = document.querySelectorAll('.product-name');
    searchInput.addEventListener('keyup', function(e) {
        e.preventDefault();
        let filter = this.value.toLowerCase();
        for(let i=0; i<row.length; i++) {
            let txtValue = code[i].innerHTML || name[i].innerHTML;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                row[i].classList.remove('hidden');
            } else {
                row[i].classList.add('hidden');
            }
        }
    });
</script>


@endsection