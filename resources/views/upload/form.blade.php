@extends('layouts.base')
@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-y-3">
            <div class="md:inset-x-auto">
                <h1 class="text-4xl text-center my-4">UPLOAD FORMS FOR IMPORT</h1>
            </div>
            @if ($message = Session::get('success'))
                <div class="bg-green-400 text-white mx-auto text-center">
                    <p>{{$message}}</p>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-3 gap-3">
            <div class="p-4 border-2 border-gray-500">
                <h2 class="text-2xl font-bold">1. Clear Databases Table</h2>
                <p class="my-3 text-gray-500">Clic Submit button for clean databases</p>
                <form action="{{route('clean')}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="border-solid text-white bg-blue-600 hover:bg-red-400 p-2 my-2 block">Clear Databases</button>
                </form>
            </div>
            <div class="p-4 border-2 border-gray-500">
                <h2 class="text-2xl font-bold">2. Import Old Inventory</h2>
                <form action="{{route('import.old')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('post')
                    <p class="my-2 text-gray-500">Input the Barcode, SKU name column in excel, csv file.</p>
                    <div class="my-2">
                        <label for="primary_key_old">Column Key</label>
                        <input type="text" name="primary_key_old" id="primary_key_old" value="Barcode" class="p-2 border-black"><br>
                    </div>
                    <p class="my-2 text-gray-500">Select your file from old inventory, then press submit button.</p>
                    <input type="file" name="products_old_file" id="products_old_file" required>
                    <button type="submit" class="border-solid text-white bg-blue-600 hover:bg-blue-400 p-2 my-4 block">Submit Old Inventory</button>
                </form>
            </div>
            <div class="p-4 border-2 border-gray-500">
                <h2 class="font-bold text-2xl">3. Import New Inventory</h2>
                <form action="{{route('import.new')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('post')
                    <p class="my-2 text-gray-500">Input the Barcode, SKU, or any name column in excel, csv file.</p>
                    <div class="my-2">
                        <label for="primary_key_old">Column Key</label>
                        <input type="text" name="primary_key_new" id="primary_key_new" value="Barcode" class="p-2 border-black"><br>
                    </div>
                    <p class="my-2 text-gray-500">Select your file from new inventory, then press submit button.</p>
                    <input type="file" name="products_new_file" id="products_new_file" required class="block">
                    <button type="submit" class="border-solid text-white bg-blue-600 hover:bg-blue-400 p-2 my-2">Submit New Inventory</button>
                </form>
            </div>

        </div>
        <div class="grids grid-cols-1">
            <div class="p-4 text-center">
                <a href="{{ route('compare') }}" class="m-3 p-3 bg-green-400 text-withe">Show Report</a>
            </div>
        </div>
    </div>
@endsection
