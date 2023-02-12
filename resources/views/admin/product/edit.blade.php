<x-admin.master>
    <x-slot:title>
        {{__('Edit Product')}}
    </x-slot:title>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h2">{{__('Edit Product')}}</h2>

        </div>
        <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">{{__('Details')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="apearance-tab" data-bs-toggle="tab" data-bs-target="#apearance-tab-pane" type="button" role="tab" aria-controls="apearance-tab-pane" aria-selected="false">{{__('Apearance')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="pricing-tab" data-bs-toggle="tab" data-bs-target="#pricing-tab-pane" type="button" role="tab" aria-controls="pricing-tab-pane" aria-selected="false">{{__('Pricing')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">{{('SEO Tags')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">{{('Image')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">{{('Color')}}</button>
                    </li>
                </ul>
                <!-- home tab -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">{{__('Product Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name',$product->name)}}">
                            @error('name') <small class=" text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="code" class="form-label">{{__('Product Code')}}</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{old('code',$product->code)}}">
                            @error('code') <small class=" text-danger">{{$message}}</small> @enderror
                        </div>

                        <!-- dropdown -->
                        <div class="row">
                            <div class="col-md-3">

                                <div class="form-group mb-3">
                                    <select name="category_id" class="block w-full mt-1 rounded-md">
                                        <option value="">{{__('Select Category')}}</option>
                                        @foreach ($categories as $item)

                                        <option @selected($item->id == $product->category_id)
                                            value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="form-group mb-3">
                            <label for="slug" class="form-label">{{__('Slug')}}</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$product->slug)}}">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="shortDefination" class="form-label">{{__('Short Defination')}}</label>
                            <input type="text" class="form-control" id="shortDefination" name="shortDefination" value="{{old('shortDefination',$product->shortDefination)}}">
                            @error('shortDefination') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 100px">{{$product->description}}</textarea>
                            <label for="description">{{(' Descroption')}}</label>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="test" id="test" name="test" style="height: 100px">{{$product->test}}</textarea>
                            <label for="test">{{(' Test')}}</label>
                            @error('test') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="result" id="result" name="result" style="height: 100px">{{$product->result}}</textarea>
                            <label for="result">{{(' Result')}}</label>
                            @error('result') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="howToUse" id="howToUse" name="howToUse" style="height: 100px">{{$product->howToUse}}</textarea>
                            <label for="howToUse">{{(' How To Use')}}</label>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="pack" id="pack" name="pack" style="height: 100px">{{$product->pack}}</textarea>
                            <label for="pack">{{('Pack')}}</label>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="ingredient" id="ingredient" name="ingredient" style="height: 100px">{{$product->ingredient}}</textarea>
                            <label for="ingredient">{{('Ingredient')}}</label>
                            @error('ingredient') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="weight" class="form-label">{{__('Weight')}}</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="{{old('weight',$product->weight)}}">
                            @error('weight') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="pao" class="form-label">{{__('pao')}}</label>
                            <input type="text" class="form-control" id="pao" name="pao" value="{{old('pao',$product->pao)}}">
                            @error('pao') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="origin" class="form-label">{{__('Origin')}}</label>
                            <input type="text" class="form-control" id="origin" name="origin" value="{{old('origin',$product->origin)}}">
                            @error('origin') <small class="text-danger">{{$message}}</small> @enderror
                        </div>

                    </div>
                    <!-- apearance -->

                    <div class="tab-pane fade" id="apearance-tab-pane" role="tabpanel" aria-labelledby="apearance-tab" tabindex="0">

                        <div class="form-group mb-3">
                            <input type="checkbox" id="status" name="status" {{$product->status == '1' ? 'checked' : ''}}>
                            <label class="form-label">{{__('Active')}}</label>
                        </div>
                        <div class="form-group mb-3">
                            <input type="checkbox" id="trending" name="trending" {{$product->trending == '1' ? 'checked' : ''}}>
                            <label class="form-label">{{__('Trending')}}</label>
                        </div>

                    </div>
                    <!-- Pricing -->
                    <div class="tab-pane fade" id="pricing-tab-pane" role="tabpanel" aria-labelledby="pricing-tab" tabindex="0">

                        <div class="form-group mb-3">
                            <label for="costing" class="form-label">{{__('Costing')}}</label>
                            <input type="number" class="form-control" id="costing" name="costing" value="{{old('costing',$product->costing)}}">
                            @error('costing') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="originalPrice" class="form-label">{{__('Original Price')}}</label>
                            <input type="number" class="form-control" id="originalPrice" name="originalPrice" value="{{old('originalPrice',$product->originalPrice)}}">
                            @error('originalPrice') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="sellingPrice" class="form-label">{{__('Selling Price')}}</label>
                            <input type="number" class="form-control" id="sellingPrice" name="sellingPrice" value="{{old('sellingPrice',$product->sellingPrice)}}">
                            @error('sellingPrice') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>
                    <!-- SEO Tags -->
                    <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">

                        <div class="form-group mb-3">
                            <label for="meta_title" class="form-label">{{__('Meta Title')}}</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title',$product->meta_title)}}">
                            @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_keyword" class="form-label">{{__('Meta Keyword')}}</label>
                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{old('meta_keyword',$product->meta_keyword)}}">
                            @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_description" class="form-label">{{__('Meta Description')}}</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{old('meta_description',$product->meta_description)}}">
                            @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">

                        <div class="form-group my-3">
                            <label for="images" class="form-label"><strong>{{__('Upload product Images')}}</strong></label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            @error('images') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>
                    <!-- Color -->
                    <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                        <div class="form-group my-3">
                            <label for="colors" class="form-label"><strong>{{__('Select New Color')}}</strong></label>
                            <div class="row">
                                @forelse($colors as $item)
                                <div class="col-md-2">
                                    <div class="p-2 border mb-3">
                                        <input type="checkbox" id="colors" name="colors[{{$item->id}}]" value="{{$item->id}}"><span> </span>{{$item->name}}
                                        <br>
                                        <input type="number" class="form-control" id="stock" name="colorStock[{{$item->id}}]" value="{{old('stock')}}" placeholder="Stock">
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h4>{{__('No Colors Available')}}</h4>
                                </div>

                                @endforelse
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{__('Color Name')}}</th>
                                        <th>{{__('Color Stock')}}</th>
                                        <th>{{__('Delete')}}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($product->productColor as $item)
                                    <tr class="prod-color-tr">
                                        <td>
                                            @if($item->color)
                                            {{$item->color->name}}
                                            @else
                                            {{__('No color Added!')}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <input type="number" value="{{$item->stock}}" class="productColorQuantity form-control form-control-sm">
                                                <button type="button" value="{{$item->id}}" class="updateProductColorBtn btn btn-primary btn sm text-white">{{__('Update')}}</button>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$item->id}}" class="deleteProductColorBtn btn btn-primary btn sm text-white">{{__('Delete')}}</button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>

    </div>
    <div class="my-5">
        <button type="submit" class="btn btn-sm btn-outline-primary">{{__('Save')}}</button>
        <a href="{{route('category.index')}}" class="btn btn-sm btn-outline-secondary">{{__('Close')}}</a>
    </div>

    </form>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.updateProductColorBtn', function() {
                var product_id = "{{$product->id}}";
                var prod_color_id = $(this).val();
                var stk = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                // alert(stk);

                if (stk <= 0) {
                    alert("Stock id Required")
                    return false;
                }
                var data = {
                    'product_id': product_id,
                    'stk': stk
                }

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message)
                    }
                });
            });
            $(document).on('click', '.deleteProductColorBtn', function() {
                var product_id = "{{$product->id}}";
                var prod_color_id = $(this).val();
                var ths = $(this);

                // alert(stk);



                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    success: function(response) {
                        ths.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                });
            });
        });
    </script>
    @endpush
</x-admin.master>