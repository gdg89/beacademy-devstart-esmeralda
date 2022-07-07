
<h1>Produtos -Admin</h1>
<a href="{{route('admin.products.create')}}" >Cadastrar novo Produto</a>
<table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Stock</th>
                <th scope="col">Preço Custo</th>
                <th scope="col">Preço Venda</th>
                <th scope="col">Imagem</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_description }}</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>{{ $product->cost_price }}</td>
                <td>{{ $product->sale_price }}</td>
                <td>{{ date('d/m/Y - H:i', strtotime($product->created_at)) }}</td>
                <td><img src="{{ $product->image }}" alt=""></td>
                <td><a href="{{ route('admin.products.edit', $product->id) }}" >Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>


