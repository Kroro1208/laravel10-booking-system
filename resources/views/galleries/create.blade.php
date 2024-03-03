<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('New Event') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('events.store') }}" x-data="{
                country: null,
                city: null,
                cities: [],
                onCountryChange(event) {
                    axios.get(`/countries/${event.target.value}`).then(res => {
                        this.cities = res.data
                    })
                }
            }" enctype="multipart/form-data" class="p-4 bg-white dark:bg-slate-800 rounded-md">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">イベント名</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="イベント名を入力してください">
                        @error('title')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">選択してください</label>
                        <select id="city_id" name="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <template x-for="city in cities" :key="city.id">
                                <option x-bind:value="city.id" x-text="city.name"></option>
                            </template>
                        </select>
                        @error('city_id')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">開催場所</label>
                        <input type="text" id="address" name="address" value="{{old('address')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="開催場所の住所を入力してください">
                        @error('address')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">画像アップロード</label>
                        <input class="block w-full text-sm text-gray-500 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
                        @error('image')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">開催日</label>
                        <input type="date" id="start_date" name="start_date" value="{{old('start_date')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Laravel event">
                        @error('start_date')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">終了日</label>
                        <input type="date" id="end_date" name="end_date" value="{{old('end_date')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Laravel event">
                        @error('end_date')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">開催時間</label>
                        <input type="time" id="start_time" name="start_time" value="{{old('start_time')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Laravel event">
                        @error('start_time')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="num_tickets" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">チケット枚数</label>
                        <input type="number" id="num_tickets" name="num_tickets" value="{{old('num_tickets')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1">
                        @error('num_tickets')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">イベント詳細</label>
                        <textarea id="description" name="description" value="{{old('description')}}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="イベントの詳細を記載してください"></textarea>
                        @error('description')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-10 flex justify-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">イベント作成</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>