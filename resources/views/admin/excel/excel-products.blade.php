<a href="{{route('admin.export-products')}}">export</a>

<table>
    <thead>
        <tr>
            <th scope="col" style="width: 100px;">Mã sản phẩm</th>
            <th scope="col" class="px-4 py-3">Tên sản phẩm</th>
            <th scope="col" class="px-4 py-3">Danh mục</th>
            <th scope="col" class="px-4 py-3">Tài liệu</th>
            <th scope="col" class="px-4 py-3">Phần mềm</th>
            <th scope="col" class="px-4 py-3">Driver</th>
            <th scope="col" class="px-4 py-3">Ảnh sản phẩm - link</th>
            <th scope="col" class="px-4 py-3">Thông số</th>
            <th scope="col" class="px-4 py-3">Giá trị</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr class="border-b ">
            <td class="px-4 py-3">{{ $product->code }}</td>
            <td class="px-4 py-3">{{ $product->name }}</td>
            <td class="px-4 py-3">
                @if($product -> category_id != 0)  
                    <span class="text-xs inline-block px-2 py-1 rounded-sm text-white bg-green-400">{{ $product->category->name }}</span>
                @else
                    <span class="text-xs inline-block px-2 py-1 rounded-sm text-white bg-red-300">Không thuộc danh mục nào</span>
                @endif
            </td>
            <?php
                foreach($extendProduct as $extend) {
                    if($extend->product_id == $product->id) {
                        $document = json_decode($extend->document);
                        $software = json_decode($extend->software);
                        $driver = json_decode($extend->driver);
                    }
                }
            ?>
            <td>
               @if($document != '')
                <ul>
                    @foreach((array)$document as $document)
                    <li>{{'document/'.$product->code.'/'.$document}}</li>
                    @endforeach
                </ul>
                @else
                <span></span>
               @endif
            </td>
            <td>
               @if($software != '')
                <ul>
                    @foreach((array)$software as $software)
                    <li>{{'software/'.$product->code.'/'.$software}}</li>
                    @endforeach
                </ul>
                @else
                <span></span>
               @endif
            </td>
            <td>
               @if($driver != '')
                <ul>
                    @foreach((array)$driver as $driver)
                    <li>{{'driver/'.$product->code.'/'.$driver}}</li>
                    @endforeach
                </ul>
                @else
                <span></span>
               @endif
            </td>
            <?php 
                $listImage = json_decode($product->images);
            ?>
            <td class="px-4 py-3">
                <ul>
                    @foreach($listImage as $listImage)
                        <li>{{ $product->code.'/'.$listImage }}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <ul>
                @foreach($product->specTypes as $key => $type)
                @if($type->category_id == $product->category_id)
                    <li>{{ $type->name }} : {{$type->pivot->value}}</li>
                @endif
                @endforeach
                </ul>
            </td>
           
           
            
            
            
        </tr>
        @endforeach
    </tbody>
</table>
