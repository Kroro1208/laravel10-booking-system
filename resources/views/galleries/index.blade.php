<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{__('Gallery')}}
            </h2>
            <div>
                <a href="{{route('galleries.create')}}" class="dark:text-white hover:text-slate-200">New Gallery</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-auto">
                <table class="w-full text-sm text-left text-gray-500dark:text-gray-400">
                    <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                画像
                            </th>
                            <th scope="col" class="px-6 py-3">
                                キャプション
                            </th>
                            <th scope="col" class="px-6 py-3">
                                アクション
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galleries as $gallery)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium to-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{asset('storage/'.$gallery->image)}}" class="w-20 h-20 rounded-lg">
                            </th>
                            <td class="px-6 py-4">
                                {{$gallery->caption}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-5">
                                    <a href="{{route('galleries.edit', $gallery)}}" class="text-gray-900 bg-green-400 hover:text-white hover:bg-green-600 border-gray-100 rounded-full py-2 px-4">編集</a>
                                    <form method="POST" action="{{ route('galleries.destroy', $gallery) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('galleries.destroy', $gallery) }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-gray-900 border bg-red-400 hover:bg-red-600 hover:text-white rounded-full py-2 px-4">
                                            画像削除
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=4 class="px-6 py-4 text-center text-gray-500dark:text-gray-400">
                                画像が見つかりません
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>