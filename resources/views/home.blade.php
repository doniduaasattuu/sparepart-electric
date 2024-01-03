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
                    <h4 class="mb-2">{{ $title }} EI2</h4>
                    <hr>
                </div>

                <!-- REGISTRY NEW MATERIAL -->
                <div class="mb-3">
                    <a class="text-dark nav-link d-inline-block" aria-current="page" href="/registry-part">
                        <svg class="me-1 mb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="grey" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                        </svg>
                        Registry New Material</a>
                </div>
                <!-- REGISTRY NEW MATERIAL -->

                <!-- FILTER SPAREPART -->
                <div class="mb-3">
                    <label for="filter_parts" class="form-label fw-bold">Filter Sparepart</label>
                    <input type="text" class="form-control" id="filter_parts" name="filter_parts" placeholder="Filter by material number or material description.">
                </div>
                <!-- FILTER SPAREPART -->

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Material Number</th>
                        <th scope="col">Material Description</th>
                        <th class="text-center" scope="col">Type</th>
                        <th class="text-center" scope="col">Qty</th>
                        <th scope="col">Location</th>
                        <th class="text-center" scope="col">Image</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $number = 1
                    @endphp

                    @foreach ($parts->toArray() as $part )

                    <!-- PARTS -->
                    <tr class="table_row">
                        <td>{{ $number }}</td>
                        @foreach ($part as $key => $value )

                        @if ($key == 'material_type' or $key == 'qty')
                        <td class="text-break text-center">{{ $value }}</td>
                        @else
                        <td class="text-break">{{ $value }}</td>
                        @endif
                        @endforeach

                        <!-- BUTTON IMAGE -->
                        <td class="text-center" title="Click for image">
                            <a href="/storage/images/{{ $part['id'] }}.jpg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="grey" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                    <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                    <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1z" />
                                </svg>
                                <!-- <button type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-file-earmark-image" viewBox="0 0 16 16">
                                        <path d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                        <path d="M14 14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM4 1a1 1 0 0 0-1 1v10l2.224-2.224a.5.5 0 0 1 .61-.075L8 11l2.157-3.02a.5.5 0 0 1 .76-.063L13 10V4.5h-2A1.5 1.5 0 0 1 9.5 3V1z" />
                                    </svg>
                                </button> -->
                            </a>
                        </td>
                        <!-- BUTTON IMAGE -->

                        <!-- BUTTON EDIT -->
                        <td class="text-center" title="Click for edit">
                            <!-- <form id="edit_form_{{ $part['id'] }}" action="/part-detail/{{ $part['id'] }}" method="GET"> -->
                            <a href="/part-detail/{{ $part['id'] }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#198754" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                                <!-- <button type="submit" material_id="{{ $part['id'] }}" material_description="{{ $part['material_description'] }}" class="btn btn-success button_edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg>
                                </button> -->
                            </a>
                        </td>
                        <!-- BUTTON EDIT -->

                        <!-- BUTTON DELETE -->
                        <td class="text-center" title="Click for delete material">
                            <!-- <form id="delete_form_{{ $part['id'] }}" action="/delete-part/{{ $part['id'] }}" method="POST"> -->
                            <!-- @csrf -->
                            <!-- <input type="hidden" id="id" name="id" value="{{ $part['id'] }}"> -->

                            <a class="button_delete" material_id="{{ $part['id'] }}" material_description="{{ $part['material_description'] }}" href="/delete-part/{{ $part['id'] }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#dc3545" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                </svg>
                            </a>

                            <!-- <button type="button" material_id="{{ $part['id'] }}" material_description="{{ $part['material_description'] }}" class="btn btn-danger button_delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </button> -->
                            <!-- </form> -->
                        </td>
                        <!-- BUTTON DELETE -->

                    </tr>
                    <!-- PARTS -->

                    @php
                    $number += 1
                    @endphp
                    @endforeach
                </tbody>
            </table>

            <!-- PAGINATION -->
            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> -->
            <!-- PAGINATION -->

        </div>
    </div>

    <script type="text/javascript">
        let button_deletes = document.getElementsByClassName('button_delete');
        let filter_parts = document.getElementById("filter_parts");
        let table_rows = document.getElementsByClassName("table_row")
        let parts = <?php echo json_encode($parts) ?>

        // console.log(parts);

        let part_names = [];
        for (let i = 0; i < parts.length; i++) {
            part_names.push(parts[i].material_description);
        }

        let part_numbers = [];
        for (let i = 0; i < parts.length; i++) {
            part_numbers.push(parts[i].id);
        }

        for (let i = 0; i < button_deletes.length; i++) {

            let name = `${button_deletes[i].getAttribute("material_description")}`;
            let id = `${button_deletes[i].getAttribute("material_id")}`;
            let form = document.getElementById("delete_form_" + `${id}`)

            button_deletes[i].onclick = () => {
                if (confirm('Do you want to delete ' + name + ' ?')) {
                    form.submit();
                } else {
                    return false;
                }
            }
        }

        function resetFilter(part_names, table_rows) {

            for (let i = 0; i < part_names.length; i++) {
                table_rows[i].classList.remove("d-none");
            }
        }

        filter_parts.oninput = () => {
            filter_parts.value = filter_parts.value.toUpperCase();

            if (filter_parts.value.trim().length > 0) {
                if (!isNaN(filter_parts.value.trim())) {
                    resetFilter(part_names, table_rows);

                    for (let i = 0; i < part_numbers.length; i++) {
                        if (!part_numbers[i].match(filter_parts.value.trim().toUpperCase())) {
                            table_rows[i].classList.add("d-none");
                        }
                    }
                } else {
                    resetFilter(part_names, table_rows);

                    for (let i = 0; i < part_names.length; i++) {
                        if (!part_names[i].match(filter_parts.value.trim().toUpperCase())) {
                            table_rows[i].classList.add("d-none");
                        }
                    }
                }
            } else {
                resetFilter(part_names, table_rows);
            }
        }
    </script>

</body>

</html>