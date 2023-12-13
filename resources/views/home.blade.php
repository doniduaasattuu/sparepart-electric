<!DOCTYPE html>
<html lang="en">

@include("utility.head")

<body>
    @include("utility.navbar")

    <!-- MESSAGE -->
    @if (session("message"))
    <div class="modal fade" id="message" tabindex="-1" aria-labelledby="messageLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="bg-light modal-header">
                    <h1 class=" modal-title fs-5" id="messageLabel">Message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session("message") }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let message = new bootstrap.Modal(document.getElementById('message'), {});
        message.show();
    </script>
    @endif
    <!-- MESSAGE -->

    <div class="container">
        <div class="card shadow p-4 my-4">
            <table class="table">
                <div class="mb-1">
                    <h4 class="mb-2">Data Product</h4>
                    <p class="mb-0 text-secondary">Toko Pelopor Sistem Belanja Online</p>
                    <p class="mb-0 text-secondary">Total product in warehouse: <b class="text-dark">{{ $total }}</b> items</p>
                    <hr>
                </div>

                <div class="mb-3">
                    <label for="filter" class="form-label fw-bold">Filter Product</label>
                    <input type="text" class="form-control" id="filter_product" name="filter_product" placeholder="Filter By Product Name">
                </div>

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $number = 1
                    @endphp

                    @foreach ($products->toArray() as $product )

                    <!-- PRODUCTS -->
                    <tr class="table_row">
                        <td>{{ $number }}</td>
                        @foreach ($product as $key => $value )
                        <td class="text-break">{{ $value }}</td>
                        @endforeach

                        <!-- BUTTON EDIT -->
                        <td>
                            <form id="edit_form_{{ $product['id'] }}" action="/product-detail/{{ $product['id'] }}" method="GET">
                                <button type="submit" product_id="{{ $product['id'] }}" product_name="{{ $product['name'] }}" class="btn btn-success button_edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <!-- BUTTON EDIT -->

                        <!-- BUTTON DELETE -->
                        <td>
                            <form id="delete_form_{{ $product['id'] }}" action="/delete-product" method="POST">
                                @csrf
                                <input type="hidden" id="id" name="id" value="{{ $product['id'] }}">
                                <button type="button" product_id="{{ $product['id'] }}" product_name="{{ $product['name'] }}" class="btn btn-danger button_delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <!-- BUTTON DELETE -->

                    </tr>
                    <!-- PRODUCTS -->

                    @php
                    $number += 1
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        let button_deletes = document.getElementsByClassName('button_delete');
        let filter_product = document.getElementById("filter_product");
        let table_rows = document.getElementsByClassName("table_row")
        let products = <?php echo json_encode($products) ?>

        let product_names = [];

        for (let i = 0; i < products.length; i++) {
            product_names.push(products[i].name);
        }

        for (let i = 0; i < button_deletes.length; i++) {

            let name = `${button_deletes[i].getAttribute("product_name")}`;
            let id = `${button_deletes[i].getAttribute("product_id")}`;
            let form = document.getElementById("delete_form_" + `${id}`)

            button_deletes[i].onclick = () => {
                if (confirm('Do you want to delete ' + name + ' ?')) {
                    form.submit();
                } else {
                    return false;
                }
            }
        }

        function resetFilter(product_names, table_rows) {

            for (let i = 0; i < product_names.length; i++) {
                table_rows[i].classList.remove("d-none");
            }
        }

        filter_product.oninput = () => {
            if (filter_product.value.length > 0) {
                resetFilter(product_names, table_rows);

                for (let i = 0; i < product_names.length; i++) {
                    if (!product_names[i].match(filter_product.value.toUpperCase())) {
                        table_rows[i].classList.add("d-none");
                    }
                }
            } else {
                resetFilter(product_names, table_rows);
            }
        }
    </script>

</body>

</html>