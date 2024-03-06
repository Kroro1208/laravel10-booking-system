<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                イベント一覧
            </h2>
            <div>
                <a href="{{route('events.create')}}" class="w-1/3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    新規イベント作成</a>
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
                                イベント名
                            </th>
                            <th scope="col" class="px-6 py-3">
                                開催日
                            </th>
                            <th scope="col" class="px-6 py-3">
                                開催国
                            </th>
                            <th scope="col" class="px-6 py-3">
                                アクション
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium to-gray-900 whitespace-nowrap dark:text-white">
                                {{$event->title}}
                            </th>
                            <td class="px-6 py-4">
                                {{$event->start_date}}
                            </td>
                            <td class="px-6 py-4">
                                {{$event->country->name}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-5">
                                    <a href="{{route('events.edit', $event)}}" class="text-gray-900 bg-green-400 hover:text-white hover:bg-green-600 border-gray-100 rounded-full py-2 px-4">編集</a>
                                    <form method="POST" action="{{ route('events.destroy', $event) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('events.destroy', $event) }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-gray-900 border bg-red-400 hover:bg-red-600 hover:text-white rounded-full py-2 px-4">
                                            イベント削除
                                        </a>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=4 class="px-6 py-4 text-center text-gray-500dark:text-gray-400">
                                現在イベントはありません
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>