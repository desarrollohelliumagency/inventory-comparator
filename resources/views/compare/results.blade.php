@extends('layouts.base')
@section('content')
<div class="container mx-auto">
    <div class="border m-2 p-3">
        <h2 class="text-center font-bold">Whitout Stock Products</h2>
        @if(!empty($whithoutStock))
        <table class="table">
            <thead>
                <tr>
                    <td>Key</td>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($whithoutStock as $item)
                    <tr>
                        <td>{{ $item['key'] }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No products whitout stock</p>
        @endif
    </div>
    <div class="border m-2 p-3">
        <h2 class="text-center font-bold">New Products</h2>
        @if(!empty($newStock))
        <table>
            <thead>
                <tr>
                    <td>Key</td>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($newStock as $item)
                    <tr>
                        <td>{{ $item['key'] }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No New Products</p>
        @endif
    </div>
    <div class="border m-2 p-3">
        <h2 class="text-center font-bold">update Products</h2>
        @if(!empty($updateProduct))
        <table>
            <thead>
                <tr>
                    <td>Key</td>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($updateProduct as $item)
                    <tr>
                        <td>{{ $item['key'] }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No products whit updates</p>
        @endif
    </div>
</div>    
@endsection