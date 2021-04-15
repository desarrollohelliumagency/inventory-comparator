@extends('layouts.base')
@section('content')
<div class="container mx-auto">
    <div class=" grid grid-1 border m-2 p-3">
        <h2 class="text-center font-bold text-blue-600 text-xl uppercase py-2">products out of stock
        </h2>
        @if(!empty($whithoutStock))
            <table class="table-auto border-collapse">
                <thead>
                <tr>
                    <td class="border text-center font-bold border-blue-400 p-2">Key</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Actual Quantity</td>

                </tr>
                </thead>
                <tbody>
                @foreach($whithoutStock as $item)
                    <tr>
                        <td class="border border-blue-400 p-2">{{ $item['key'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['quantity_on_hand'] }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-red-600 text-lg">There are no products.</p>
        @endif
    </div>

    <div class=" grid grid-1 border m-2 p-3">
        <h2 class="text-center font-bold text-blue-600 text-xl uppercase py-2">New products</h2>
        @if(!empty($newStock))
            <table class="table-auto border-collapse">
                <thead>
                <tr>
                    <td class="border text-center font-bold border-blue-400 p-2">Key</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Actual Quantity</td>

                </tr>
                </thead>
                <tbody>
                @foreach($newStock as $item)
                    <tr>
                        <td class="border border-blue-400 p-2">{{ $item['key'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['quantity_on_hand'] }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-red-600 text-lg">There are no products.</p>
        @endif
    </div>

    <div class=" grid grid-1 border m-2 p-3">
        <h2 class="text-center font-bold text-blue-600 text-xl uppercase py-2">updated products with increased quantities</h2>
        @if(!empty($updateProductPlus))
            <table class="table-auto border-collapse">
                <thead>
                <tr>
                    <td class="border text-center font-bold border-blue-400 p-2">Key</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Actual Quantity</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Before Quantity</td>
                </tr>
                </thead>
                <tbody>
                @foreach($updateProductPlus as $item)
                    <tr>
                        <td class="border border-blue-400 p-2">{{ $item['key'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['quantity_on_hand'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['old_quantity_on_hand'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-red-600 text-lg">There are no products.</p>
        @endif
    </div>

    <div class=" grid grid-1 border m-2 p-3">
        <h2 class="text-center font-bold text-blue-600 text-xl uppercase py-2">products updated with decreasing quantities</h2>
        @if(!empty($updateProductMinus))
            <table class="table-auto border-collapse">
                <thead>
                <tr>
                    <td class="border text-center font-bold border-blue-400 p-2">Key</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Actual Quantity</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Before Quantity</td>
                </tr>
                </thead>
                <tbody>
                @foreach($updateProductMinus as $item)
                    <tr>
                        <td class="border border-blue-400 p-2">{{ $item['key'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['quantity_on_hand'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['old_quantity_on_hand'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-red-600 text-lg">There are no products.</p>
        @endif
    </div>

    <div class=" grid grid-1 border m-2 p-3">
        <h2 class="text-center font-bold text-blue-600 text-xl uppercase py-2">updated products with equal quantities</h2>
        @if(!empty($updateProductEquals))
            <table class="table-auto border-collapse">
                <thead>
                <tr>
                    <td class="border text-center font-bold border-blue-400 p-2">Key</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Actual Quantity</td>
                    <td class="border text-center font-bold border-blue-400 p-2">Before Quantity</td>
                </tr>
                </thead>
                <tbody>
                @foreach($updateProductEquals as $item)
                    <tr>
                        <td class="border border-blue-400 p-2">{{ $item['key'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['quantity_on_hand'] }}</td>
                        <td class="border border-blue-400 text-right p-2">{{ $item['old_quantity_on_hand'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-red-600 text-lg">There are no products.</p>
        @endif
    </div>
</div>
@endsection
